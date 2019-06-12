<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\User;
use yii\filters\VerbFilter;
use backend\models\UserSearch;
use backend\models\PersonaSearch;
use yii\web\NotFoundHttpException;
use backend\helpers\ConexionApi;
use yii\data\ActiveDataProvider;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       /* if (Yii::$app->session->get('offline')) {
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        } else {
            /*echo "<pre>";
            $dataProvider2 = $searchModel->search(Yii::$app->request->queryParams);
            print_r($dataProvider2);
            echo "<hr/>";
            $dataProvider = ConexionApi::apiGet([], '/items');
            //print_r(json_encode($dataProvider["response"]));
            //echo "</pre>";
            $dataProvider = json_decode($dataProvider["response"]);

            $dataProvider = new ActiveDataProvider($dataProvider["value"]);
            //print_r($dataProvider);
    } */

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(int $id = 0, bool $respuesta = null)
    {
        $model = new User();

        if (count(Yii::$app->request->post()) > 0) {
            $this->createUser($model, Yii::$app->request->post(), $id);
        }
        return $this->render('create', [
            'model' => $model,
            'response' => $respuesta
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function createUser($model, $post, int $id)
    {
        if (Yii::$app->session->get('offline')) {
            $model->username = $post["User"]["username"];
            $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($post["User"]["password_hash"]);
            $model->plataformaUsuario = $post["User"]["plataformaUsuario"];
            $model->plataformaEmei = $post["User"]["plataformaEmei"];
            $model->plataformaPlataforma = $post["User"]["plataformaPlataforma"];
            $model->auth_key = '000000aaaa';
            $model->personaId = $id;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $usuario = [
                "username"             => $post["User"]["username"],
                "auth_key"             => '000000aaaa',
                "password_hash"        => Yii::$app->getSecurity()->generatePasswordHash($post["User"]["password_hash"]),
                "created_at"           => strtotime("now"),
                "updated_at"           => strtotime("now"),
                "idPersona"            => $id,
                "plataformaUsuario"    => $post["User"]["plataformaUsuario"],
                "plataformaPlataforma" => $post["User"]["plataformaPlataforma"],
                "plataformaEmei"       => $post["User"]["plataformaEmei"],
                "estadoUsuario"        => 1,
                "access_token"         => 0
            ];
            $respuesta = ConexionApi::apiPost($usuario, '/usuario');
            if ($respuesta["curl"]->responseCode === 200) {
                //$respuesta = json_decode($respuesta["response"]);
                return $this->redirect('create');
            } else {
                //$respuesta = json_decode($respuesta["response"]);
                return $this->redirect('create');
            }
        }
    }
}
