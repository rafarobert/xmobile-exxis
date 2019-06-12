<?php

namespace backend\modules\Login\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\helpers\ConexionApi;
use backend\modules\Login\models\User;
use backend\modules\Login\models\LoginForm;

/**
 * Default controller for the `login` module
 */
class DefaultController extends Controller
{
  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'rules' => [
          [
            'actions' => ['index','configuraciones','localidad','localidadguardar'],
            'allow' => true,
          ]
        ],
      ],
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'logout' => ['post'],
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function actions()
  {
    return [
      'error' => [
        'class' => 'yii\web\ErrorAction',
      ],
    ];
  }

  /**
   * Renders the index view for the module
   * @return string
   */
  public function actionIndex()
  {
    $this->layout = 'layoutLogin';
    if (getenv('FIRSTTIME', 0) == 1) {
      $model = new LoginForm();
      $data = Yii::$app->request->post();
      if ($model->load($data)) {
        if (!Yii::$app->user->isGuest) {
          $this->redirect(Yii::$app->request->baseUrl."/site");
        }
        if (isset($data["offline"])) {
          Yii::$app->session->set('offline', true);
          $this->loginAction($data['LoginForm']['username'], $data['LoginForm']['password']);
        } else {
          Yii::$app->session->set('offline', false);
          $this->httpPost($data['LoginForm'], $model);
        }
      } else {
        $model->password = '';
        return $this->render('index', ["model" => $model,"inicio" => false]);
      }
    } else {
      return $this->render('configuraciones');
    }
  }

  public function actionConfiguraciones()
  {
    $this->layout = 'layoutLogin';
    $post = Yii::$app->request->post();
    $file = Yii::getAlias('@app') . '/config/.env';
    $config = [
      'YII_DEBUG' => true,
      'YII_ENV' => 'dev',
      'DB_USER' => 'root',
      'DB_PWD' => $post["password-db"],
      'DB_NAME' => 'exxis',
      'DB_DNS' => $post["ip-server-db"],
      'FIRSTTIME' => 1,
      'SERVER_MD' => $post["ip-server"]
    ];
    foreach ($config as $key => $value) {
      file_put_contents($file, "{$key}={$value}\n", FILE_APPEND);
    }
    $db = new yii\db\Connection([
      'dsn' => "mysql:host={$post["ip-server-db"]};dbname=test",
      'username' => 'root',
      'password' => $post["password-db"],
      'charset' => 'utf8',
    ]);
    $path = Yii::getAlias('@app') . '/config/exxis.sql';
    $dataBase = file_get_contents($path);
    try {
      $transaction = $db->beginTransaction();
      $sql1 = 'CREATE DATABASE exxis;USE exxis;';
      $db->createCommand($sql1)->execute();
      $db->createCommand($dataBase)->execute();
      $transaction->commit();
      return $this->render('index', ["model" => new LoginForm(),"inicio" => true]);
    } catch (\Exception $e) {
      $transaction->rollBack();
      throw $e;
    } catch (\Throwable $e) {
      $transaction->rollBack();
      throw $e;
    }
  }

  public function actionLocalidad()
  {
    $localizaciones = ConexionApi::apiGet([],'/localidad');
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    return $localizaciones;
  }

  public function actionLocalidadguardar()
  {
    $datos = Yii::$app->request->post();
    $file = Yii::getAlias('@app') . '/config/.env';
    $localidad = strtolower($datos["localidad"]);
    file_put_contents($file, "LANG={$localidad}\n", FILE_APPEND);
    $etiquetas = ConexionApi::apiGet([],"/localidad/{$datos["idLocalidad"]}");
    $file = Yii::getAlias('@common') . "/messages/{$localidad}";
    mkdir($file, 0777, true);
    $miArchivo = fopen($file."/backend.php", "w") or die("No se puede abrir/crear el archivo!");
    $php = "<?php
    return [ ";
    foreach ($etiquetas["datos"] as $key => $value) {
      $php .= "'{$key}' => '{$value}',\n";
    }
    $php .= "]; ?>";
    fwrite($miArchivo, $php);
    fclose($miArchivo);
    return $this->redirect(['/']);
  }

  public function httpPost(array $data,$modelo)
  {
      $userLogin = [
          'usuarioNombreUsuario' => $data['username'],
          'usuarioClaveUsuario'  => $data['password'],
          'plataformaTipo'       => 'w',
          'plataformaPlataforma' => 0,
          'plataformaEmei'       => 0,
      ];
      $response = ConexionApi::apiPost($userLogin,'/login');
      switch ($response['code']) {
          case 201:
              $this->loginAction($modelo->username,$modelo->password);
              break;
          case 100:
              $this->response($response["datos"],$modelo);
              break;
          default:
              Yii::$app->session->setFlash('errorServer', 'Error al iniciar sesion');
              return $this->goBack();
              break;
      }
  }

  private function response($response,$modelo)
  {
      $session = Yii::$app->session;
      switch ($response->estado) {
          case 200:
          $identity = User::findOne(['username' => $modelo->username]);
          if (!is_null($identity)) {
              if (Yii::$app->getSecurity()->validatePassword($modelo->password, $identity->password_hash)) {
                  Yii::$app->user->login($identity);
                  $session->set('token',$response->token);
                  return $this->redirect(Yii::$app->request->baseUrl."/site");
              } else {
                  Yii::$app->session->setFlash('userNotFound', 'Usuario o Contraseña invalidos');
                  return $this->goBack();
              }
          } else {
              Yii::$app->session->setFlash('userNotFound', 'Usuario o Contraseña invalidos');
              return $this->goBack();
          }
              break;
          case 201:
              Yii::$app->session->setFlash('userNotFound', 'Usuario o Contraseña invalidos');
              return $this->goBack();
          default:
              Yii::$app->session->setFlash('userNotFound', 'Usuario o Contraseña invalidos');
              return $this->goBack();
              break;
      }
  }

  private function loginAction(string $username,string $password)
  {
      $identity = User::findOne(['username' => $username]);
      if (!is_null($identity)) {
          if (Yii::$app->getSecurity()->validatePassword($password, $identity->password_hash)) {
              Yii::$app->user->login($identity);
              return $this->redirect(Yii::$app->request->baseUrl."/site");
          } else {
              Yii::$app->session->setFlash('userNotFound', 'Usuario o Contraseña invalidos');
              return $this->goBack();
          }
      } else {
          Yii::$app->session->setFlash('userNotFound', 'Usuario o Contraseña invalidos');
          return $this->goBack();
      }
  }
}
