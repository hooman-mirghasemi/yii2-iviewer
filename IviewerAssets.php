<?php
/**
 * Created by PhpStorm.
 * User: Hooman
 * Date: 4/10/2017
 * Time: 10:29 AM
 */

namespace hoomanMirghasemi\iviewer;


use yii\web\AssetBundle;

class IviewerAssets extends AssetBundle
{

    public $sourcePath = '@hoomanMirghasemi/iviewer/assets';

    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public $js = [
        'jqueryui.js',
        'jquery.iviewer.js',
        'jquery.mousewheel.js',
    ];

    public $css = [
        'jquery.iviewer.css',
    ];
}