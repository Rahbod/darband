<?php
/* @var $this PagesManageController */
/* @var $model Products */
/* @var $form CActiveForm */
?>
<? $this->renderPartial('//partial-views/_flashMessage'); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'products-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('style' => 'width:50%')
)); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'description'); ?>
        <?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>127,'class' => 'form-control')); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'price'); ?>
        <div class="input-group" style="width:100px">
            <?php echo $form->telField($model,'price',array('size'=>10,'maxlength'=>3,'class' => 'form-control')); ?>
            <span class="input-group-addon">$</span>
        </div>
        <?php echo $form->error($model,'price'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'cat_id'); ?>
        <?php echo $form->dropDownList($model,'cat_id', CHtml::listData(ProductCategories::model()->findAll('type = '.ProductCategories::TYPE_PRODUCT), 'id', 'title'),array('class' => 'form-control')); ?>
        <?php echo $form->error($model,'cat_id'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'image'); ?>
        <?php $this->widget('ext.dropZoneUploader.dropZoneUploader', array(
            'id' => 'uploaderImage',
            'model' => $model,
            'name' => 'image',
            'maxFiles' => 1,
            'maxFileSize' => 0.2, //MB
            'url' => $this->createUrl('upload'),
            'deleteUrl' => $this->createUrl('deleteUpload'),
            'acceptedFiles' => '.jpg, .jpeg, .png',
            'serverFiles' => $model->image ? new UploadedFiles($this->imagePath, $model->image) : [],
            'onSuccess' => '
                var responseObj = JSON.parse(res);
                if(responseObj.status){
                    {serverName} = responseObj.fileName;
                    $(".uploader-message").html("");
                }
                else{
                    $(".uploader-message").html(responseObj.message);
                    this.removeFile(file);
                }
            ',
        )); ?>
        <?php echo $form->error($model,'image'); ?>
        <div class="uploader-message error"></div>
        <p><small>اندازه مناسب برای تصویر 80 در 130 پیکسل می باشد.</small></p>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'image_full'); ?>
        <?php $this->widget('ext.dropZoneUploader.dropZoneUploader', array(
            'id' => 'uploaderImageFull',
            'model' => $model,
            'name' => 'image_full',
            'maxFiles' => 1,
            'maxFileSize' => 2, //MB
            'url' => $this->createUrl('uploadFull'),
            'deleteUrl' => $this->createUrl('deleteUploadFull'),
            'acceptedFiles' => '.jpg, .jpeg, .png',
            'serverFiles' => $model->image_full ? new UploadedFiles($this->imagePath, $model->image_full) : [],
            'onSuccess' => '
                var responseObj = JSON.parse(res);
                if(responseObj.status){
                    {serverName} = responseObj.fileName;
                    $(".uploader-message").html("");
                }
                else{
                    $(".uploader-message").html(responseObj.message);
                    this.removeFile(file);
                }
            ',
        )); ?>
        <?php echo $form->error($model,'image_full'); ?>
        <div class="uploader-full-message error"></div>
        <p><small>اندازه مناسب برای تصویر 800 در 1200 پیکسل می باشد.</small></p>
    </div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'افزودن' : 'ویرایش',array('class' => 'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>