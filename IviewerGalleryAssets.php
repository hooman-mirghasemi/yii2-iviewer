<?php
namespace hoomanMirghasemi\iviewer;


use yii\web\AssetBundle;

class IviewerGalleryAssets extends AssetBundle
{

    public $sourcePath = '@hoomanMirghasemi/iviewer/assets';

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
    ];

    public $js = [
        'jquery.iviewer.js',
        'jquery.mousewheel.js',
    ];

    public $css = [
        'iviewer.css',
    ];
}
