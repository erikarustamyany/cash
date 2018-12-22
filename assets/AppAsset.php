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
        '/css/site.css',
        '/css/bootstrap.min.css',
        '/css/nouislider.min.css',
        '/css/slick.css',
        '/css/slick-theme.css',
        '/css/font-awesome.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
        '/css/select2-dropdown.css',
        '/css/fileinput.css',
        '/css/theme.min.css',
        '/css/croppie.css',
        '/css/leaflet.css',
        '/css/main.css',
    ];
    public $js = [
        '/js/jquery.min.js',
        '/js/bootstrap.min.js',
        '/js/jquery.zoom.min.js',
        '/js/nouislider.min.js',
        '/js/fileinput.js',
        '/js/sortable.min.js',
        '/js/uk.js',
        '/js/theme.js',
        '/js/croppie.js',
        '/js/leaflet-src.js',
        '/js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset'
//        'yii\bootstrap\BootstrapAsset',
    ];
}
