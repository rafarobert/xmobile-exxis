<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?= $this->render('header') ?>
        <?= $this->render('menu') ?>
        <div class="content-page" style="margin-top:0;padding-top:70px">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="row">
                        <?= $content ?>
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->
            <?= $this->render('footer') ?>
        </div>
    </div>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>