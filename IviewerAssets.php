<?php
namespace hoomanMirghasemi\iviewer;


use yii\web\AssetBundle;

class IviewerAssets extends AssetBundle
{

    public $sourcePath = '@hoomanMirghasemi/iviewer/assets';

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
    ];

    public $js = [
        'jquery.mousewheel.js',
        'jquery.iviewer.js',
    ];

    public $css = [
        'new-style/jquery.iviewer.css',
        'iviewer.css',
    ];
}
