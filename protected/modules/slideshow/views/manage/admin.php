<?php
/* @var $this SlideshowManageController */
/* @var $model Slideshow */

$this->breadcrumbs=array(
	'مدیریت',
);

$this->menu=array(
	array('label'=>'افزودن تصویر', 'url'=>array('create')),
);
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">مدیریت تصاویر</h3>
        <a href="<?php echo $this->createUrl('create')?>" class="btn btn-default btn-sm">افزودن تصویر</a>
    </div>
    <div class="box-body">
        <?php $this->renderPartial("//partial-views/_flashMessage"); ?>

        <div class="table-responsive">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'template' => '{items}',
                'dataProvider'=>$model->search(),
                'filter'=>$model,
                'itemsCssClass'=>'table table-striped table-hover',
                'columns'=>array(
                    array(
                        'name' => 'image',
                        'header' => 'تصویر',
                        'filter' => '',
                        'type' => 'html',
                        'value' => 'CHtml::tag("div",
							array("style"=>"text-align: center" ) ,
							CHtml::tag("img",
								array("height"=>"200px","width"=>"400px",
									"src" => "' . Yii::app()->createAbsoluteUrl('/uploads/slideshow/$data->image') . '" ,"alt" => ""
									)
								)
							)',
                    ),
                    array(
                        'class'=>'CButtonColumn',
                        'template' => '{update} {delete}'
                    )
                )
            )); ?>
        </div>
    </div>
</div>