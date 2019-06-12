<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use backend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="baseUrl" content="<?= Url::base(true); ?>">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
	
	
    <div class="loader"></div>
    <div class="wrap">
        <?= $this->render('header') ?>
        <?= $this->render('menu') ?>
        <div class="content-page" style="margin-top:0;padding-top:70px">
            <div class="content">
                <div class="container-fluid">
                    <?= $content ?>
                </div>
            </div>
            <?= $this->render('footer') ?>
        </div>
    </div>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>