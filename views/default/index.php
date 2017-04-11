<?php
echo \hoomanMirghasemi\iviewer\Iviewer::widget([
    'selector' => '#iviewer-content',
    'loadingSelector'=>'#iv-loading',
    'beforeIviewer'=>'$("#iviewer-content").html("");',
    'imageSrc' => $fileSrc,
]);
?>
<div id="iviewer-body">
    <div id="iviewer-content">
        <div id="iv-loading" style="display: table;overflow: hidden;">
            <span style="display: table-cell;padding-right: 10px;vertical-align: middle;">
                <div >
                    <span class="loding_text"><?= $this->context->module->loadingText ?></span>
                    <i class="fa fa-spinner fa-pulse fa-4x loding_img"></i>
                </div>
            </span>
        </div>
    </div>
</div>
