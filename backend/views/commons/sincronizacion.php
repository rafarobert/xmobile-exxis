<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('backend','tit_Sincr');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?= Yii::t('backend','men_Sincr') ?></a></li>
                    <li class="breadcrumb-item active"><?= $this->title ?></li>
                </ol>
            </div>
            <h4 class="page-title"><?= $this->title ?></h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
            <?= Html::beginForm(['commons/sincronizacion'], 'post', ['class' => 'form-horizontal']) ?>
                <form class="form-horizontal" action="<?= Url::toRoute(['commons/sincronizacion']); ?>">
                    <div class="form-group row mb-3">
                        <label for="inputEmail3" class="col-3 col-form-label"><?= Yii::t('backend','rbt_Client')?> </label>
                        <div class="col-9">
                            <input type="checkbox" name="chb-clientes" class="chb_lista" data-plugin="switchery" data-color="#2b3d51" value="clientes"/>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="inputPassword3" class="col-3 col-form-label"><?= Yii::t('backend','rbt_Product') ?> </label>
                        <div class="col-9">
                        <input type="checkbox" class="chb_lista" name="chb-productos" data-plugin="switchery" data-color="#2b3d51" value="productos"/>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="inputPassword5" class="col-3 col-form-label"><?= Yii::t('backend','rbt_User') ?></label>
                        <div class="col-9">
                            <input type="checkbox" class="chb_lista" name="chb-usuarios" data-plugin="switchery" data-color="#2b3d51" value="usuarios"/>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="inputPassword5" class="col-3 col-form-label"><?= Yii::t('backend','chk_MarkAll') ?> </label>
                        <div class="col-9">
                            <input type="checkbox" data-plugin="switchery" data-color="#2b3d51" value="todo" id="todo"/>
                        </div>
                    </div>
                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-9">
                            <button type="submit" class="btn btn-info waves-effect waves-light"><?= Yii::t('backend','btn_SincrStart') ?></button>
                        </div>
                    </div>
                <?= Html::endForm() ?>
            </div>
        </div>
    </div>
</div>
<script>
    var status = '<?= $status ?>';
</script>
<?= $this->registerJsFile(Yii::getAlias('@web') . '/js/jquery.js', ['position' => \yii\web\View::POS_BEGIN]); ?>