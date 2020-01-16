<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAssetLogin extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    //    'css/site.css',

    'css/bootstrap.min.css',
    //'css/plugins/metisMenu/metisMenu.min.css',
    //'css/plugins/timeline.css',
    //'css/sb-admin-2.css',
    //'css/plugins/morris.css',
    //'css/font-awesome/font-awesome.min.css',

    //"css/plugins/dataTables.bootstrap.css",
      //  'css/viewfactor.css',




    ];
    public $js = [

//'js/jquery-1.11.0.js',

//'js/bootstrap.min.js',

//'js/metisMenu/metisMenu.min.js',

//'js/raphael/raphael.min.js',
//'js/morris/morris.min.js',
//'js/sb-admin-2.js',
  //      'js/upload-img.js',
    //    "js/jquery/jquery.dataTables.min.js",
      //  "js/bootstrap/dataTables.bootstrap.min.js",
        //'js/bootstrap-datepicker.min.js',
       // 'js/bootstrap-datepicker.fa.min.js',
       // 'js/datepicker.js',
       // 'js/js2.js',


   


   

    
 
    
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
