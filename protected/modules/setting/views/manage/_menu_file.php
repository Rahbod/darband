<?php
/* @var $this SettingManageController */
/* @var $model SiteSetting */
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">فایل منو</h3>
    </div>
    <div class="box-body">
    <?
    $form = $this->beginWidget('CActiveForm',array(
        'id'=> 'forms-setting',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ));
    ?>

    <?php $this->renderPartial('//partial-views/_flashMessage') ?>
        
    <div class="form-group">
        <?php echo CHtml::label($model->title,''); ?><br>
        <?php $this->widget('ext.dropZoneUploader.dropZoneUploader', array(
            'id' => 'uploader-'.$model->name,
            'model' => $model,
            'name' => $model->name,
            'maxFiles' => 1,
            'maxFileSize' => 10, //MB
            'url' => $this->createUrl('uploadMenu'),
            'deleteUrl' => $this->createUrl('deleteMenu'),
            'acceptedFiles' => '.pdf, .doc, .docx',
            'serverFiles' => $model->value ? new UploadedFiles($this->formPath, $model->value) : [],
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
        <div class="uploader-message error"></div>
    </div>
    
    <div class="form-group buttons">
        <?php echo CHtml::submitButton('ذخیره',array('class' => 'btn btn-success')); ?>
    </div>
    <?
    $this->endWidget();
    ?>
    </div>
</div>