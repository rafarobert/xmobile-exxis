<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Configuración Inicial'
?>
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center w-75 m-auto">
                            <a href="javascript:void(0)">
                                <span><?= Html::img('@web/images/logologin.png', ['alt' => 'My logo','height' => 18]) ?></span>
                            </a>
                            <p class="text-muted mb-4 mt-3">Datos Iniciales de Cofiguración</p>
                        </div>
                        <?php
                            if(Yii::$app->session->getFlash('userNotFound')):?>
                            <div class="alert alert-danger bg-danger text-white border-0" role="alert">
                                <?= Yii::$app->session->getFlash('userNotFound') ?>
                            </div>
                        <?php endif; ?>
                        <?php
                            if(Yii::$app->session->getFlash('notFound')):?>
                            <div class="alert alert-danger bg-danger text-white border-0" role="alert">
                                <?= Yii::$app->session->getFlash('notFound') ?>
                            </div>
                        <?php endif; ?>
                        <?php $form = ActiveForm::begin(['id' => 'settings-form','action'=>['configuraciones'],'options' => ['class' => 'form-label-group','autocomplete' => 'off'] ]); ?>
                            <div class="form-group">
                              <label for="ip-server" class="control-label">Dirección del Servidor Middleware: </label>
                              <input type="text" id="ip-server" name="ip-server" class="form-control" placeholder="Direcció del Servidor Middleware">
                            </div>
                            <div class="form-group">
                              <label for="ip-server-db" class="control-label">Dirección del Servidor de Base de Datos: </label>
                              <input type="text" id="ip-server-db" name="ip-server-db" class="form-control" placeholder="Direcció del Servidor de Base de Datos">
                            </div>
                            <div class="form-group">
                              <label for="user-db" class="control-label">Nombre de Usuario de Base de Datos: </label>
                              <input type="text" id="user-db" name="user-db" class="form-control" placeholder="Nombre de Usuario de Base de Datos">
                            </div>
                            <div class="form-group">
                              <label for="password-db" class="control-label">Contraseña: </label>
                              <input type="password" name="password-db" class="form-control" placeholder="Contraseña">
                            </div>
                            <div class="form-group mb-0 text-center">
                                <?= Html::submitButton('Grabar', ['class' => 'btn btn-danger btn-block']) ?>
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
<?= $this->registerJsFile(Yii::getAlias('@web') . '/js/index.js', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>