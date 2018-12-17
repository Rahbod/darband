<?php
/* @var $this SlideshowManageController */
/* @var $model Slideshow */
/* @var $image array */

$this->breadcrumbs=array(
	'مدیریت'=>array('admin'),
	'افزودن',
);

$this->menu=array(
	array('label'=>'مدیریت تصاویر', 'url'=>array('admin')),
);
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">افزودن تصویر</h3>
    </div>
    <div class="box-body">
        <?php $this->renderPartial('_form', array(
            'model'=>$model,
            'image'=>$image,
        )); ?>
    </div>
</div>