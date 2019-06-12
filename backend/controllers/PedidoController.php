<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii2mod\behaviors\CarbonBehavior;
use backend\models\Cliente;

class PedidoController extends Controller
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
                        'actions' => ['nuevo', 'buscar'],
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

    public function actionNuevo()
    {
        $var = Yii::$app->request->post();
        if (count($var)) {
            # code...
        }

        return $this->render('nuevo');
    }

    public function actionBuscar()
    {
        $datos = Yii::$app->request->post();
        $datos = isset($datos['search']) ? $datos['search'] : '';
        $cliente = Cliente::find()
                    ->where('CardName like :nombre',[':nombre' => "%{$datos}%"])
                    ->asArray()
                    ->all();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $cliente;
    }
}
