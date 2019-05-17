<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'libs/jquery-vectormap/jquery-jvectormap-1.2.2.css',
        'css/bootstrap.min.css',
        'css/icons.min.css',
        'css/app.min.css',
        'css/styles.css'
    ];
    public $js = [
        'js/vendor.min.js',
        'js/app.js'
    ];
    public $depends = [
        /*'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',*/
    ];
}
