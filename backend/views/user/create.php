<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = Yii::t('backend','tit_Create');
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@backend/views/layouts/breadcrumbsDouble',[ 'function' => Yii::t('backend','rbt_User'), 'title' => $this->title ]); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="user-create">
                    <div class="card-title">
                        <h1><?= Html::encode($this->title) ?></h1>
                    </div>
                    <?= $this->render('_form', [
                        'model' => $model
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>