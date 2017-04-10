<?php

namespace hoomanMirghasemi\iviewer;
use Yii;

/**
 * This is just an example.
 */
class Iviewer extends \yii\base\Widget
{
    public $selector;
    public $loading;
    public $loadingSelector;
    public $beforeIviewer;
    public $imageSrc;
    public $jsHandlerVar;

    public function init() {
        $this->view->registerAssetBundle(IviewerAssets::className());
    }

    public function run()
    {
        $this->renderIviewerJs();
    }

    public function renderIviewerJs() {
        if(empty($this->jsHandlerVar)){
            $this->jsHandlerVar='iviewerHandler';
        }

        $jsCode = <<<SETUP
        {$this->beforeIviewer}
        $("{$this->selector}").html("{$this->loading}");
        var img = $("<img />").attr('src', '$this->imageSrc').load(function(){
            if(this.complete){
                $("{$this->selector}").html("");
                var {$this->jsHandlerVar}=$("{$this->selector}").iviewer({src:'$this->imageSrc'});
            }else if(typeof this.naturalWidth == "undefined" || this.naturalWidth == 0){
                alert('متاسفانه تصویر دچار مشکلی شده است.');
            }else{
                 alert('متاسفانه تصویر دچار مشکلی شده است.');
            }
        });
SETUP;
        Yii::$app->view->registerJs($jsCode, \yii\web\View::POS_END);
    }
}
