<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PersonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend','tit_Person');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@backend/views/layouts/breadcrumbsSimple',[ 'title' => $this->title ]); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="persona-index">
                    <h1><?= Html::encode($this->title) ?></h1>
                    <p>
                        <?= Html::a(Yii::t('backend','btn_CreatePerson'), ['create'], ['class' => 'btn btn-success']) ?>
                    </p>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'idPersona',
                            'nombrePersona',
                            'apellidoPPersona',
                            'apellidoMPersona',
                            'estadoPersona',
                            //'userId',
                            //'created_at',
                            //'updated_at',

                            ['label'=> 'Seleccionar',
                            'value' =>function($model){ 
                                return Html::a('<i class="far fa-check-circle"></i>',['user/create','id' => $model->idPersona],['class' => 'btn btn-success']);
                            },
                            'format' => 'raw'
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
