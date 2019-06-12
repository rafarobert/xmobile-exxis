<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="form-group row">
            <div class="col-sm-6">
                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'password_hash')->passwordInput() ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <?= $form->field($model, 'plataformaUsuario')->dropDownList([
                    'w' => 'Web',
                    'm' => 'Mobil'
                ],
                [
                    'promp' => 'Seleccione uno...'
                ]) ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'plataformaPlataforma')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <?= $form->field($model, 'plataformaEmei')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    <div class="form-group row justify-content-between">
        <div class="col-sm-2">
            <?= Html::a(Yii::t('backend','btn_AddPerson'),['/persona'], ['class' => 'btn btn-warning btn-block' ]) ?>
        </div>
        <div class="col-sm-2">
            <?= Html::submitButton(Yii::t('backend','btn_UserRegistry'), ['class' => 'btn btn-success btn-block']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>