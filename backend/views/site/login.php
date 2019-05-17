<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Ingreso al Sistema'
?>
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center w-75 m-auto">
                            <a href="javascript:void(0)">
                                <span><?= Html::img('@web/images/logo-dark.png', ['alt' => 'My logo','height' => 18]) ?></span>
                            </a>
                            <p class="text-muted mb-4 mt-3">Ingresa tu nombre de usuario y contraseña para acceder al sistema</p>
                        </div>

                        <h5 class="auth-title">Inicio de Sesión</h5>
                        <?php $form = ActiveForm::begin(['id' => 'login-form','options' => ['class' => 'form-label-group','autocomplete' => 'off'] ]); ?>

                            <div class="form-group mb-3">
                            <?= $form->field($model, 'username', ['template' => "{label}\n{input}\n{error}\n{hint}"]) ?>
                            </div>
                            <div class="form-group mb-3">
                                <?= $form->field($model, 'password',['template' => "{label}\n{input}\n{error}\n{hint}"])->passwordInput() ?>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <?= Html::submitButton('Ingresar', ['class' => 'btn btn-danger btn-block']) ?>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>