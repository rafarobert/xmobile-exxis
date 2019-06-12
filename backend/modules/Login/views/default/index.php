<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Ingreso al Sistema'
?>
<?= $this->registerCssFile(Yii::getAlias('@web') . '/libs/switchery/switchery.min.css', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<div class="account-pages mt-5 mb-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card">
          <div class="card-body p-4">
            <div class="text-center w-75 m-auto">
              <a href="javascript:void(0)">
                <span><?= Html::img('@web/images/logologin.png', ['alt' => 'My logo', 'height' => 18]) ?></span>
              </a>
              <p class="text-muted mb-4 mt-3"><?= Yii::t('backend','lbl_LoginDesc')?></p>
            </div>

            <h5 class="auth-title"><?= Yii::t('backend','tit_Login') ?></h5>
            <?php
            if (Yii::$app->session->getFlash('userNotFound')) : ?>
              <div class="alert alert-danger bg-danger text-white border-0" role="alert">
                <?= Yii::$app->session->getFlash('userNotFound') ?>
              </div>
            <?php endif; ?>
            <?php
            if (Yii::$app->session->getFlash('notFound')) : ?>
              <div class="alert alert-danger bg-danger text-white border-0" role="alert">
                <?= Yii::$app->session->getFlash('notFound') ?>
              </div>
            <?php endif; ?>
            <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'form-label-group', 'autocomplete' => 'off']]); ?>

            <div class="form-group mb-3">
              <?= $form->field($model, 'username', ['template' => "{label}\n{input}\n{error}\n{hint}"]) ?>
            </div>
            <div class="form-group mb-3">
              <?= $form->field($model, 'password', ['template' => "{label}\n{input}\n{error}\n{hint}"])->passwordInput() ?>
            </div>
            <div class="form-group mb-0 text-center mb-2 pull-right">
              <label for=""><?= Yii::t('backend','lbl_Mode')?></label>
              <input type="checkbox" data-plugin="switchery" data-color="#ed4817" value="offline" id="offline" name="offline" />
            </div>
            <div class="form-group mb-0 text-center">
              <?= Html::submitButton(Yii::t('backend','btn_Login'), ['class' => 'btn btn-danger btn-block']) ?>
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
<?php if($inicio){ ?>
  <div id="modal-localizacion" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Localización</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <select name="localidad" id="localidad" class="form-control">

          </select>
        </div>
        <div class="modal-footer">
          <button id="btn-guardar" type="button" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<?= $this->registerJsFile(Yii::getAlias('@web') . '/libs/switchery/switchery.min.js', ['position' => \yii\web\View::POS_END, 'depends' => [\backend\assets\AppAsset::className()]]); ?>
<?php
  if ($inicio) {
    echo $this->registerJsFile(Yii::getAlias('@web') . '/js/localizacion.js', ['position' => \yii\web\View::POS_END,'depends' => [\backend\assets\AppAsset::className()]]);
  }
?>