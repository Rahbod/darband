<?php
/* @var $this SlideshowManageController */
/* @var $model Slideshow */
/* @var $form CActiveForm */
/* @var $image array */
?>

<div class="form">
	<?php $this->renderPartial('//partial-views/_flashMessage'); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'slideshow-form',
	'enableAjaxValidation'=>true,
));
?>
	<?php echo $form->errorSummary($model); ?>

<!--	<div class="form-group">-->
<!--		--><?php //echo $form->labelEx($model,'title'); ?>
<!--		--><?php //echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
<!--		--><?php //echo $form->error($model,'title'); ?>
<!--	</div>-->

	<div class="form-group">
		<?php $this->widget('ext.dropZoneUploader.dropZoneUploader', array(
			'id' => 'uploaderFile',
			'model' => $model,
			'name' => 'image',
			'maxFiles' => 1,
			'maxFileSize' => 2, //MB
			'url' => $this->createUrl('/slideshow/manage/upload'),
			'deleteUrl' => $this->createUrl('/slideshow/manage/deleteUpload'),
			'acceptedFiles' => '.jpeg, .jpg, .png, .gif',
			'serverFiles' => $image,
			'onSuccess' => '
				var responseObj = JSON.parse(res);
				if(responseObj.state == "ok")
				{
					{serverName} = responseObj.fileName;
				}else if(responseObj.state == "error"){
					console.log(responseObj.msg);
				}
		',
		));
		?>
	</div>

<!--	<div class="form-group">-->
<!--		--><?php //echo $form->labelEx($model,'link'); ?>
<!--		--><?php //echo $form->textField($model,'link',array('size'=>60,'maxlength'=>2000)); ?>
<!--		--><?php //echo $form->error($model,'link'); ?>
<!--	</div>-->

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'ثبت' : 'ذخیره',array('class' => 'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->