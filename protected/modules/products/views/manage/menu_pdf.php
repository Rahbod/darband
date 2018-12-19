<?php
/* @var $categories ProductCategories[] */

$path = Yii::getPathOfAlias('webroot').'/uploads/foods/';
$url = Yii::app()->getBaseUrl(true).'/uploads/foods/';
?>
<page>
    <div class="pdf-page">
        <?php foreach ($categories as $category):
            $cr = Products::validQuery()->compare('cat_id', $category->id);
            $products = Products::model()->findAll($cr);
            if(!$products) continue;?>
            <div class="head">
                <h2><?= $category->title ?><span></span></h2>
            </div>
            <?php
            $cr = Products::validQuery()->compare('cat_id', $category->id);
            $products = Products::model()->findAll($cr);
            foreach ($products as $data):?>
                <div class="menu-item">
                    <div class="item-image">
                        <?php if($data->image && is_file($path.$data->image)): ?>
                            <img src="<?= $url.$data->image ?>">
                        <?php endif; ?>
                    </div>
                    <div class="details">
                        <div>
                            <h5><?= $data->title ?><span>$<?= number_format($data->price) ?></span></h5>
                            <p><?= $data->description ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endforeach;?>
    </div>
</page>

<style>
    .pdf-page{
        color: #1d1d1d !important;
        padding: 30px;
    }
    .pdf-page *{
        color: #1d1d1d !important;
    }
    .pdf-page .head{
        margin: 30px 0 0 0;
        display: inline-block;
        width: 100%;
    }
    .pdf-page .head> h2{
        position: relative;
        display: inline-block;
        padding: 8px 15px 8px 0;
        text-align: left;
        font-weight: bold;
        text-transform: uppercase;
        color: #000;
    }
    .pdf-page .head> h2 span{
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        height: 4px;
        background-color: #e12828;
        display: inline-block;
    }
    .menu-item{
        display: block;
        overflow: hidden;
        height: 70px;
        position: relative;
    }
    .menu-item .item-image{
        float: left;
        border-radius: 15px;
        display: inline-block;
        overflow: hidden;
        width: 100px;
        height: 60px;
        margin: 5px;
        position: absolute;
        top: 5px;
        left: 5px;
    }
    .menu-item .item-image img{
        width: 100%;
        height: 100%;
    }
    .menu-item .details{
        display: block;
        overflow: hidden;
        height: 80px;
        padding: 12px 100px 0 125px;
        position: relative;
    }

    .menu-item h5{
        color: #1d1d1d;
        padding-top: 12px;
        margin: 0;
        font-weight: bold;
        font-size: 13pt;
    }
    .menu-item p{
        text-transform: none;
        font-weight: 500;
        margin: 4px 0 0;
        line-height: 16px;
        font-size: 11pt;
    }
    .menu-item h5,
    .menu-item p{
        color: #1d1d1d !important;
        text-align: left;
    }
    .menu-item h5 span{
        color: #1d1d1d !important;
        text-align: left;
        font-size: 11pt;
        position: absolute;
        right: 10px;
        top: 20px;
    }
</style>