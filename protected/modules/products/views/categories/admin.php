<?php
/* @var $this ProductsCategoriesController */
/* @var $model ProductCategories */

$this->breadcrumbs=array(
    'دسته بندی ها'=>array('admin'),
    'مدیریت دسته بندی ها',
);
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">مدیریت دسته بندی ها</h3>
        <a href="<?php echo $this->createUrl('create')?>" class="btn btn-default btn-sm">افزودن دسته بندی</a>
    </div>
    <div class="box-body">
        <?php $this->renderPartial("//partial-views/_flashMessage"); ?>
        <div class="table-responsive">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'admins-grid',
                'dataProvider'=>$model->search(),
                'filter'=>$model,
                'itemsCssClass'=>'table table-striped table-hover',
                'columns'=>array(
                    'title',
                    array(
                        'name' => 'type',
                        'value' => '$data->type == 0 ? "محصول" : "پروژه"'
                    ),
                    array(
                        'class'=>'CButtonColumn',
                        'template' => '{update}{delete}'
                    )
                )
            )); ?>
        </div>
    </div>
</div>