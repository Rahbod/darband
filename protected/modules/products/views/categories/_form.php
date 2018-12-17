<?php
/* @var $this ProductsCategoriesController */
/* @var $model ProductCategories */
/* @var $form CActiveForm */
?>
<? $this->renderPartial('//partial-views/_flashMessage'); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-categories-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'type'); ?>
        <?php echo $form->dropDownList($model,'type',ProductCategories::$typeLabels, array('class' => 'form-control')); ?>
        <?php echo $form->error($model,'type'); ?>
    </div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'افزودن' : 'ویرایش',array('class' => 'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>