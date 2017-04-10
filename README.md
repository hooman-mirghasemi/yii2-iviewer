iviewer
=======
iviewer can use for zoom and rotate image, it is use iviewer jquery plugin 

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist hooman.mirghasemi/yii2-iviewer "*"
```

or add

```
"hooman.mirghasemi/yii2-iviewer": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php
echo \hoomanMirghasemi\iviewer\Iviewer::widget([
    'selector' => '#iviewer-content',
    'loadingSelector'=>'#iv-loading',
    'beforeIviewer'=>'$("#iviewer-content").html("");',
    'imageSrc' => 'path to your image',
]);
?>
<div id="iviewer-body">
    <div id="iviewer-content">
        <div id="iv-loading" style="display: table;overflow: hidden;">
            <span style="display: table-cell;padding-right: 10px;vertical-align: middle;">
                <div >
                    <span class="loding_text">در حال بارگذاری تصویر</span>
                    <i class="fa fa-spinner fa-pulse fa-4x loding_img"></i>
                </div>
            </span>
        </div>
    </div>
</div>
```