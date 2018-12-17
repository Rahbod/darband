<?php
/* @var $this ProductsCategoriesController */
/* @var $model ProductCategories */

$this->breadcrumbs=array(
	'مدیریت دسته بندی ها'=>array('admin'),
	'ویرایش ' . $model->title,
);

$this->menu=array(
	array('label'=>'مدیریت دسته بندی ها', 'url'=>array('admin')),
);
?>

<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">ویرایش <?= $model->title?></h3>
	</div>
	<div class="box-body">
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>