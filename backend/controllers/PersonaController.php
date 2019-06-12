<?php

namespace backend\controllers;

use Yii;
use backend\models\Persona;
use backend\models\PersonaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\helpers\ConexionApi;

/**
 * PersonaController implements the CRUD actions for Persona model.
 */
class PersonaController extends Controller
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
     * Lists all Persona models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Persona model.
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
     * Creates a new Persona model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Persona();
        if(count(Yii::$app->request->post()) > 0){
            $this->createPerson(Yii::$app->request->post(),$model);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Persona model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPersona]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Persona model.
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
     * Finds the Persona model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Persona the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Persona::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function createPerson($post,$model){
        if (Yii::$app->session->get('offline')) {
            $model->nombrePersona = $post["Persona"]["nombrePersona"];
            $model->apellidoPPersona = $post["Persona"]["apellidoPPersona"];
            $model->apellidoMPersona = $post["Persona"]["apellidoMPersona"];
            $model->userId = Yii::$app->user->identity->id;
            if ($model->save()) {
                return $this->redirect(['user/create','id' => $model->idPersona]);
            }
        } else {
            $persona = [
                'nombrePersona' => $post["Persona"]["nombrePersona"],
                'apellidoPPersona' => $post["Persona"]["apellidoPPersona"],
                'apellidoMPersona' => $post["Persona"]["apellidoMPersona"],
                'userId' => Yii::$app->user->identity->id
            ];
            $response = ConexionApi::apiPost($persona,'/persona');
            $response = json_decode($response["response"]);
            return $this->redirect(['user/create','id' => $response->idPersona]);
        }
    }
}
