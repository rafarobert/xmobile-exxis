<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\helpers\ConexionApi;
use yii2mod\behaviors\CarbonBehavior;

/**
 * Commons controller
 */
class CommonsController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => CarbonBehavior::className(),
                'attributes' => [
                    'createdAt'
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['sincronizacion'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [],
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionSincronizacion()
    {
        //set_time_limit(0);
        $var = Yii::$app->request->post();
        $status = 0;
        if (count($var) > 0) {
            $status = 1;
            if (isset($var["chb-usuarios"])) {
                //$user = Yii::$app->user->identity;
                $user = Yii::$app->user->identity;
                $this->actualizarUsuarios();
                $this->actualizarPersona();
                //Yii::$app->user->login($user);
            }
            if (isset($var["chb-productos"])) {
                $this->actualizarProductos();
            }
            if (isset($var["chb-clientes"])) {
                $this->actualizarClientes();
            }
        }
        if (isset($var["chb-usuarios"]) && is_null(Yii::$app->user->identity)) {
            return $this->redirect([Yii::$app->request->baseUrl."/"]);
        }
        return $this->render('sincronizacion', ['status' => $status]);
    }

    private function actualizarUsuarios()
    {
        $datos = [
                "access-token" => Yii::$app->session->get('token'),
            ];
        $respuesta = ConexionApi::apiGet($datos,'/user');
        $rs = $respuesta["datos"];
        $sql = '';
        $db = Yii::$app->db;
        try {
            $transaction = $db->beginTransaction();
            $sql1 = 'SET FOREIGN_KEY_CHECKS = 0; truncate table user;SET FOREIGN_KEY_CHECKS = 1';
            foreach ($rs as $value) {
                $date = intval(strtotime($value->fechaUMUsuario));
                $sql .= "insert into user (id,username,status,auth_key,password_hash,created_at,updated_at,estadoUsuario,plataformaUsuario,plataformaPlataforma,plataformaEmei,personaId) values (";
                $sql .= "'{$value->id}','{$value->username}',10,'{$value->auth_key}',";
                $sql .= "'" .$value->password_hash. "'";
                $sql .= ",'{$date}','{$date}','{$value->estadoUsuario}','{$value->plataformaUsuario}','{$value->plataformaPlataforma}','{$value->plataformaEmei}',{$value->idPersona});";
            }
            $db->createCommand($sql1)->execute();
            $db->createCommand($sql)->execute();
            $transaction->commit();
        } catch(\Exception $e) {
            $transaction->rollBack();
            throw $e;
        } catch(\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }
    }

    private function actualizarProductos()
    {
        $datos = [
            "access-token" => Yii::$app->session->get('token'),
        ];
        $respuesta = ConexionApi::apiGet($datos,'/items');
        $rs = $respuesta["datos"]->value;
        $sql = '';
        $db = Yii::$app->db;
        try {
            $transaction = $db->beginTransaction();
            $sql1 = 'SET FOREIGN_KEY_CHECKS = 0; truncate table items;SET FOREIGN_KEY_CHECKS = 1';
            foreach ($rs as $value) {
                $sql .= 'insert into items (ItemCode,ItemName,ForeignName,ItemsGroupCode,QuantityOnStock,created_at,updated_at) values(';
                $sql .= "'{$value->ItemCode}','{$value->ItemName}','{$value->ForeignName}',{$value->ItemsGroupCode},{$value->QuantityOnStock}";
                $sql .= ",'".Yii::$app->formatter->asTimestamp(date("Y-d-m h:i:s"))."','".Yii::$app->formatter->asTimestamp(date("Y-d-m h:i:s"))."');";
            }
            $db->createCommand($sql1)->execute();
            $db->createCommand($sql)->execute();
            $transaction->commit();
        } catch(\Exception $e) {
            $transaction->rollBack();
            throw $e;
        } catch(\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }
    }

    private function actualizarClientes()
    {
        $datos = [
            "access-token" => Yii::$app->session->get('token'),
        ];
        $respuesta = ConexionApi::apiGet($datos,'/clientes');
        $rs = $respuesta["datos"];
        $sql = '';
        $db = Yii::$app->db;
        try {
            $transaction = $db->beginTransaction();
            $sql1 = 'SET FOREIGN_KEY_CHECKS = 0; truncate table clientes;SET FOREIGN_KEY_CHECKS = 1';
            foreach ($rs->value as $value) {
                $sql .= 'insert into clientes (CardCode,CardName,CardType,Address,created_at,updated_at) values (';
                $sql .= "'{$value->CardCode}','{$value->CardName}','{$value->CardType}','{$value->Address}'";
                $sql .= ",'".Yii::$app->formatter->asTimestamp(date("Y-d-m h:i:s"))."','".Yii::$app->formatter->asTimestamp(date("Y-d-m h:i:s"))."');";
            }
            $db->createCommand($sql1)->execute();
            $db->createCommand($sql)->execute();
            $transaction->commit();
        } catch(\Exception $e) {
            $transaction->rollBack();
            throw $e;
        } catch(\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }
    }

    private function actualizarPersona()
    {
        $datos = [
            "access-token" => Yii::$app->session->get('token'),
        ];
        $respuesta = ConexionApi::apiGet($datos,'/persona');
        $rs = $respuesta["datos"];
        $sql = '';
        $db = Yii::$app->db;
        try {
            $transaction = $db->beginTransaction();
            $sql1 = 'SET FOREIGN_KEY_CHECKS = 0; truncate table persona;SET FOREIGN_KEY_CHECKS = 1';
            foreach ($rs as $value) {
                $estadoPersona = (is_null($value->estadoPersona))?1:$value->estadoPersona;
                $date = (!is_null($value->fechaUMPersona))?intval(strtotime($value->fechaUMPersona)):Yii::$app->formatter->asTimestamp(date("Y-d-m h:i:s"));
                $sql .= 'insert into persona (nombrePersona,apellidoPPersona,apellidoMPersona,estadoPersona,userId,created_at,updated_at) values (';
                $sql .= "'{$value->nombrePersona}','{$value->apellidoPPersona}','{$value->apellidoMPersona}',{$estadoPersona},";
                $sql .= Yii::$app->user->identity->id;
                $sql .= ",'$date','$date');";
            }
            $db->createCommand($sql1)->execute();
            $db->createCommand($sql)->execute();
            $transaction->commit();
        } catch(\Exception $e) {
            $transaction->rollBack();
            throw $e;
        } catch(\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }
    }
}
