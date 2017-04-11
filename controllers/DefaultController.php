<?php

namespace hoomanMirghasemi\iviewer\controllers;

use yii\web\Controller;

/**
 * Default controller for the `iveiwer` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($fileSrc)
    {
        $this->layout = '@hoomanMirghasemi/iviewer/views/layouts/iviewer';
        return $this->render('index',['fileSrc'=>$fileSrc]);
    }
}
