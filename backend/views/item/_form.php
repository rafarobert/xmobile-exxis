<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ItemCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ItemName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ForeignName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ItemsGroupCode')->textInput() ?>

    <?= $form->field($model, 'QuantityOnStock')->textInput() ?>

    <?= $form->field($model, 'SalesUnit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
