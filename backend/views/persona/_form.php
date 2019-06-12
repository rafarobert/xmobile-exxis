<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="persona-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nombrePersona')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'apellidoPPersona')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'apellidoMPersona')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('backend','btn_Registry'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

</div>
