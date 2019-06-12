<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
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
        'css/styles.css',
        'libs/switchery/switchery.min.css',
        'libs/sweetalert2/sweetalert2.min.css',
    ];
    public $js = [
        'js/jquery.js',
        'js/vendor.js',
        'js/app.js',
        'js/globales.js',
        'libs/switchery/switchery.min.js',
        'libs/sweetalert2/sweetalert2.min.js',
        'js/index.js'
    ];
    public $depends = [
        //'yii\web\YiiAsset'
    ];
}
