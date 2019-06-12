<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend','rbt_User');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@backend/views/layouts/breadcrumbsSimple',[ 'title' => $this->title ]); ?>
<div class="row">
    <div class="col-s-12">
        <div class="card">
            <div class="card-body">
                <div class="user-index">
                    <div class="card-text mb-2">
                        <?= Html::a(Yii::t('backend','tit_Create'), ['create'], ['class' => 'btn btn-success']) ?>
                    </div>
                    <?php /*echo $this->render('_search', ['model' => $searchModel]);*/ ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'id',
                            'username',
                            //'auth_key',
                            //'password_hash',
                            //'password_reset_token',
                            //'email:email',
                            //'status',
                            //'created_at',
                            //'updated_at',
                            //'verification_token',
                            //'plataformaUsuario',
                            //'estadoUsuario',
                            //'plataformaPlataforma',
                            //'plataformaEmei',
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>