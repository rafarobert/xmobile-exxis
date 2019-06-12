<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Persona */

$this->title = Yii::t('backend','btn_CreatePerson');
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@backend/views/layouts/breadcrumbsSimple',[ 'title' => $this->title ]); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="persona-create">
                    <div class="card-body">
                        <?= $this->render('_form', [
                            'model' => $model,
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
