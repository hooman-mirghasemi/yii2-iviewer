<?php
use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <?= Html::csrfMetaTags() ?>
        <style>
/*            #yii-jcrop-1 {
                left: 24px;
                position: absolute;
                top: 126px;
                width: 400px;
            }*/
            @-webkit-keyframes spin {
                0% {
                    -webkit-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(359deg);
                    transform: rotate(359deg);
                }
            }
            @keyframes spin {
                0% {
                    -webkit-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(359deg);
                    transform: rotate(359deg);
                }
            }
            .cropWaitingOverlay {
                background-color: #dfe3e4;
                height: 100%;
                position: absolute;
                width: 100%;
                z-index: 1000;
                display: table;
                top: 0;
                left: 0;
            }
            .spinnerContainer {
                height: 100%;
                margin: 0 auto;
                text-align: center;
                vertical-align: middle;
                width: 100%;display: table-cell
            }
            
            .spinnerContainer i {
                font-size: 60px;
                color: #0390ed;
            }
            
            .loadingText {
                font-family: IRANsans;
                font-size: 14px;
                direction: rtl;
                position: relative;
                top: 18px;
            }
        </style>
        <?php $this->head() ?>
    </head>
    <body style="overflow:hidden">
        <div class="cropWaitingOverlay">
            <div class="spinnerContainer">
                <i class="fa fa-spinner fa-spin"></i>
                <br/>
                <span class="loadingText">
                     <?= $this->context->module->loadingText ?>
                </span>
            </div>
        </div>
        <?= $content ?>

        <script>
            $(document).ready(function() {
                var interval = setInterval(function() {
                    if ($('#iviewer-content').size() == 1) {
                        if ($('#iviewer-content img').size() > 0) {
                            $('.cropWaitingOverlay').hide();
                            clearInterval(interval);
                        }
                    } else if ($('#yii-jcrop-1').size() == 1) {
                        if (!$('#yii-jcrop-1').is(':visible')) {
                            $('.cropWaitingOverlay').hide();
                            clearInterval(interval);
                        }
                    }
                },1000);
            });
        </script>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
