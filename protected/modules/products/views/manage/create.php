<?php
/* @var $this ProductsManageController */
/* @var $model Products */

$this->breadcrumbs=array(
	'مدیریت غذاها'=>array('admin'),
	'افزودن',
);

$this->menu=array(
	array('label'=>'مدیریت غذاها', 'url'=>array('admin')),
);
?>

<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">افزودن غذا</h3>
	</div>
	<div class="box-body">
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>
