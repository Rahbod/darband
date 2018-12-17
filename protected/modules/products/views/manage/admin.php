<?php
/* @var $this ProductsManageController */
/* @var $model Products */

$this->breadcrumbs=array(
    'مدیریت غذاها',
);
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">مدیریت غذاها</h3>
        <a href="<?php echo $this->createUrl('create')?>" class="btn btn-default btn-sm">افزودن غذا</a>
        <a href="<?php echo $this->createUrl('/setting/manage/menu')?>" class="btn btn-warning btn-sm">آپلود فایل منو</a>
    </div>
    <div class="box-body">
        <?php $this->renderPartial("//partial-views/_flashMessage"); ?>

        <div class="table-responsive">
            <?php
//            $this->widget('zii.widgets.grid.CGridView', array(
            $this->widget('ext.yiiSortableModel.widgets.SortableCGridView', array(
                'id'=>'admins-grid',
                'idField' => 'id',
                'orderField' => 'order',
                'orderUrl' => 'order',
                'jqueryUiSortableOptions' => array('handle' => '.sortable-handle'),
                'template' => '{items}',
                'dataProvider'=>$model->search(),
                'filter'=>$model,
                'itemsCssClass'=>'table table-striped table-hover',
                'columns'=>array(
                    ['class'=>'SortableGridColumn'],
                    'title',
                    'description',
                    array(
                        'name' => 'price',
                        'value' => '"$".number_format($data->price)'
                    ),
                    array(
                        'header' => 'دسته بندی',
                        'value' => '$data->cat->title',
                        'filter' => CHtml::activeDropDownList($model,'cat_id',CHtml::listData(ProductCategories::model()->findAll('type = '.ProductCategories::TYPE_PRODUCT), 'id', 'title'),array('prompt' => 'همه'))
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