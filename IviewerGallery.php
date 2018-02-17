<?php

namespace hoomanMirghasemi\iviewer;
use Yii;

/**
 * This is just an example.
 */
class IviewerGallery extends \yii\base\Widget
{
    public $selectorId;
    public $modalCloseText;
    private $modalId;

    public function init() {
        $this->view->registerAssetBundle(IviewerGalleryAssets::className());
        $this->modalId = $this->selectorId.'-modal';
    }

    public function run()
    {
        $this->renderIviewerJs();
        return $this->renderIviewerHtml();
    }

    public function renderIviewerHtml(){
        return '<div id="'.$this->modalId.'" class="modal fade" role="dialog">
        <div class="modal-dialog  modal_dialog_css" style="">
            <!-- Modal content-->
            <div class="modal-content modal_content_css">
                <div class="modal-header modal_header_css">
                    <button type="button" class="close close_modal_css" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                        <span>'.$this->modalCloseText.'</span>
                    </button>
                </div>
                <div class="modal-body iv-modal-body iv_-modal_body_css">
                    <div class="preview_img"><i class="fa fa-angle-right"></i></div>
                    <iframe class="iviewer-iframe" src="" style="width: 100%; height: 500px; border:0;" file-src="" next-file-src="" prev-file-src=""></iframe>
                    <div class="next_img"><i class="fa fa-angle-left"></i></div>
                </div>
            </div>

        </div>
    </div>';
    }

    public function renderIviewerJs() {
        $iframeSrc = Yii::$app->urlManager->createAbsoluteUrl(['iviewer/default/index','fileSrc'=>'']);
        $jsCode = <<<SETUP
        $(document).on("click",".iviewer-gallery-item",function(){
            var IframeSrc = "$iframeSrc"+$(this).data("iviewer-src");
            $("#$this->modalId .iviewer-iframe").attr("file-src",IframeSrc);
            $("#$this->modalId .iviewer-iframe").attr("src",IframeSrc);
            var nextFileSrc = $(this).parent().nextAll(".iviewer-gallery-item-holder:first").find(".iviewer-gallery-item").data("iviewer-src");
            var prevFileSrc = $(this).parent().prevAll(".iviewer-gallery-item-holder:first").find(".iviewer-gallery-item").data("iviewer-src");
            $("#$this->modalId .next_img").show();
            $("#$this->modalId .preview_img").show();
            if(typeof nextFileSrc === "undefined"){
                $("#$this->modalId .next_img").hide();
            }else{
                $("#$this->modalId .iviewer-iframe").attr("next-file-src",nextFileSrc);
            }
            if(typeof prevFileSrc === "undefined"){
                $("#$this->modalId .preview_img").hide();
            }else{
                $("#$this->modalId .iviewer-iframe").attr("prev-file-src",prevFileSrc);
            }
        });

        $(document).on("click","#$this->modalId .next_img",function(){
            var fileSrc = $("#$this->modalId .iviewer-iframe").attr("next-file-src");
            $("#$this->modalId .iviewer-iframe").attr("file-src",fileSrc);
            $("#$this->modalId .iviewer-iframe").attr("src","$iframeSrc"+fileSrc);
            var nextFileSrc = $(".iviewer-gallery-item[data-iviewer-src=\'"+fileSrc+"\']").parent().nextAll(".iviewer-gallery-item-holder:first").find(".iviewer-gallery-item").data("iviewer-src");
            var prevFileSrc = $(".iviewer-gallery-item[data-iviewer-src=\'"+fileSrc+"\']").parent().prevAll(".iviewer-gallery-item-holder:first").find(".iviewer-gallery-item").data("iviewer-src");
            $("#$this->modalId .next_img").show();
            $("#$this->modalId .preview_img").show();
             if(typeof nextFileSrc === "undefined"){
                $("#$this->modalId .next_img").hide();
            }else{
                $("#$this->modalId .iviewer-iframe").attr("next-file-src",nextFileSrc);
            }
            if(typeof prevFileSrc === "undefined"){
                $("#$this->modalId .preview_img").hide();
            }else{
                $("#$this->modalId .iviewer-iframe").attr("prev-file-src",prevFileSrc);
            }
        });
        
        $(document).on("click","#$this->modalId .preview_img",function(){
            var fileSrc = $("#$this->modalId .iviewer-iframe").attr("prev-file-src");
            $("#$this->modalId .iviewer-iframe").attr("file-src",fileSrc);
            $("#$this->modalId .iviewer-iframe").attr("src","$iframeSrc"+fileSrc);
            var nextFileSrc = $(".iviewer-gallery-item[data-iviewer-src=\'"+fileSrc+"\']").parent().nextAll(".iviewer-gallery-item-holder:first").find(".iviewer-gallery-item").data("iviewer-src");
            var prevFileSrc = $(".iviewer-gallery-item[data-iviewer-src=\'"+fileSrc+"\']").parent().prevAll(".iviewer-gallery-item-holder:first").find(".iviewer-gallery-item").data("iviewer-src");
            $("#$this->modalId .next_img").show();
            $("#$this->modalId .preview_img").show();
             if(typeof nextFileSrc === "undefined"){
                $("#$this->modalId .next_img").hide();
            }else{
                $("#$this->modalId .iviewer-iframe").attr("next-file-src",nextFileSrc);
            }
            if(typeof prevFileSrc === "undefined"){
                $("#$this->modalId .preview_img").hide();
            }else{
                $("#$this->modalId .iviewer-iframe").attr("prev-file-src",prevFileSrc);
            }
        });
        
        $('#$this->modalId').on('hidden.bs.modal', function () {
          $(".iviewer-iframe").attr("src","");
        });

SETUP;
        Yii::$app->view->registerJs($jsCode, \yii\web\View::POS_END);
    }
}
