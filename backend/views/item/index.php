<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">
    <?= $this->render('@backend/views/layouts/breadcrumbsSimple',[ 'title' => $this->title ]); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                <p>
                    <?php // Html::a('Create Item', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'ItemCode',
                        'ItemName',
                        'ForeignName',
                        'ItemsGroupCode',
                        'QuantityOnStock',
                        //'SalesUnit',
                        //'created_at',
                        //'updated_at',
                        //'id',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
