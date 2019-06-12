<?php
namespace backend\controllers;

use Yii;
use common\models\User;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\LoginForm;
use yii\filters\AccessControl;
use frontend\models\SignupForm;
use backend\helpers\ConexionApi;

/**
 * Site controller
 */
class SiteController extends Controller
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
                        'actions' => ['login', 'error','settings'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','signup'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSettings()
    {
        $this->layout = 'layoutLogin';
        $post = Yii::$app->request->post();
        $localidades = ConexionApi::apiGet([],'/localidad');
        if (count($post) > 0) {
            $this->cofiguracionesIniciales($post);
        }
        return $this->render("settings");
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'layoutLogin';
        $user = Yii::$app->user->identity;
        if (getenv('FIRSTTIME',0) == 1) {
            $model = new LoginForm();
            $data = Yii::$app->request->post();
            if ($model->load($data) ) {
                if (!Yii::$app->user->isGuest) {
                    return $this->goHome();
                }
                if (isset($data["offline"])) {
                    Yii::$app->session->set('offline',true);
                    $this->loginAction($data['LoginForm']['username'],$data['LoginForm']['password']);
                } else {
                    Yii::$app->session->set('offline',false);
                    $this->httpPost($data['LoginForm'],$model);
                }
            } else {
                $model->password = '';
                return $this->render('login', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->redirect(["site/settings"]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->session->remove('token');
        return $this->goHome();
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

}
