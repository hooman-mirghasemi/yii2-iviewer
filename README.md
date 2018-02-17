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
Note : you should load fontAsome in your project before use it.
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

Or  you can use it as image gallery one or more in a page that open in a bootstrap modal with next and previwe buttons
like this:

first config iviewer module in config of application
```php
'modules' => [

        'iviewer' => [
            'class' => 'hoomanMirghasemi\iviewer\Module',
            'loadingText' => 'loading ...',
        ],
    ],
```

for use it in a view file write code like this:
 ```php
 <?php
 echo \hoomanMirghasemi\iviewer\IviewerGallery::widget([
     'selectorId' => 'iviewer-gallery-1',
     'modalCloseText' => 'close',
 ]);
 ?>
 <div id="ivwever-gallery-1">
     <div class="iviewer-gallery-item-holder">
         <img 
              src="https://example.com/images/xVwSS9.jpg"
              data-iviewer-src="https://example.com/images/big-size/xVwSS9.jpg"
              class="iviewer-gallery-item" data-target="#iviewer-gallery-1-modal" data-toggle="modal"/>
     </div>
     <div class="iviewer-gallery-item-holder">
         <img 
              src="https://example.com/images/xVwSS9.jpg"
              data-iviewer-src="https://example.com/images/big-size/xVwSS9.jpg"
              class="iviewer-gallery-item" data-target="#iviewer-gallery-1-modal" data-toggle="modal"/>
     </div>
     <div class="iviewer-gallery-item-holder">
         <img 
            src="https://example.com/images/xVwSS9.jpg"
            data-iviewer-src="https://example.com/images/big-size/xVwSS9.jpg"
            class="iviewer-gallery-item" data-target="#iviewer-gallery-1-modal" data-toggle="modal"/>
     </div>
     <div class="iviewer-gallery-item-holder">
         <img 
            src="https://example.com/images/xVwSS9.jpg"
             data-iviewer-src="https://example.com/images/big-size/xVwSS9.jpg"
             class="iviewer-gallery-item" data-target="#iviewer-gallery-1-modal" data-toggle="modal"/>
     </div>
 </div>
 
 
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 
 <?php
 echo \hoomanMirghasemi\iviewer\IviewerGallery::widget([
     'selectorId' => 'iviewer-gallery-2',
     'modalCloseText' => 'close',
 ]);
 ?>
 <div id="ivwever-gallery-2">
     <div class="iviewer-gallery-item-holder">
         <img
                 src="https://example.com/images/xVwSS9.jpg"
                 data-iviewer-src="https://example.com/images/big-size/xVwSS9.jpg"
                 class="iviewer-gallery-item" data-target="#iviewer-gallery-2-modal" data-toggle="modal"/>
     </div>
     <div class="iviewer-gallery-item-holder">
         <img 
            src="https://example.com/images/xVwSS9.jpg"
            data-iviewer-src="https://example.com/images/big-size/xVwSS9.jpg"
            class="iviewer-gallery-item" data-target="#iviewer-gallery-2-modal" data-toggle="modal"/>
     </div>
     <div>
         this is on html element between ivewer items
     </div>
     <div class="iviewer-gallery-item-holder">
         <img 
            src="https://example.com/images/xVwSS9.jpg"
            data-iviewer-src="https://example.com/images/big-size/xVwSS9.jpg"
            class="iviewer-gallery-item" 
            data-target="#iviewer-gallery-2-modal" 
            data-toggle="modal"/>
     </div>
     <span>test one element</span>
 </div>
 ```
points: 
be sure that selectorId and html element contains iviwer elements
are same. and use iviewer-gallery-item-holder and iviewer-gallery-item classes for
elements. data-target should be same with selectorId+"-modal". also
data-iviewer-src is a necessary field
