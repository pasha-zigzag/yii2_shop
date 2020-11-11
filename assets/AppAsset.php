<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/bootstrap.css',
//        'css/style.css',
//        'css/font-awesome.css',
//        '//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic',
//        '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic',
//        'css/flexslider.css',

        'vendors/bootstrap/bootstrap.min.css',
        'vendors/fontawesome/css/all.min.css',
        'vendors/themify-icons/themify-icons.css',
        'vendors/linericon/style.css',
        'vendors/nice-select/nice-select.css',
        'vendors/owl-carousel/owl.theme.default.min.css',
        'vendors/owl-carousel/owl.carousel.min.css',
        'css/style.css',
        'css/aroma.css'
    ];
    public $js = [
//        'js/jquery-1.11.1.min.js',
//        'js/bootstrap.min.js',
//        'js/move-top.js',
//        'js/easing.js',
//        'js/jquery.flexslider.js',
//        'js/minicart.js',
//        'js/main.js'

        "vendors/jquery/jquery-3.2.1.min.js",
        "vendors/bootstrap/bootstrap.bundle.min.js",
        "vendors/skrollr.min.js",
        "vendors/owl-carousel/owl.carousel.min.js",
        "vendors/nice-select/jquery.nice-select.min.js",
        "vendors/nouislider/nouislider.min.js",
        "vendors/jquery.ajaxchimp.min.js",
        "vendors/mail-script.js",
        "js/main.js"

    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
