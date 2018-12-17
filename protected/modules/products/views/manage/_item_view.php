<?php
/** @var $data Products */
/** @var $key int */

$path = Yii::getPathOfAlias('webroot').'/uploads/foods/';
$url = Yii::app()->getBaseUrl(true).'/uploads/foods/';

$image = false;
if($data->image_full && is_file($path.$data->image_full))
    $image = $url.$data->image_full;
?>
<div class="menu-item">
    <a href="#">
        <div class="item-image">
            <?php if($data->image && is_file($path.$data->image)): ?>
                <img src="<?= $url.$data->image ?>" <?= $image?"data-src='{$image}'":"" ?> alt="<?= $data->title ?>">
            <?php endif; ?>
        </div>
        <div class="details">
            <div class="red-box">
                <span><b>$<?= number_format($data->price) ?></b></span>
            </div>
            <div>
                <h5><?= $data->title ?><span>$<?= number_format($data->price) ?></span></h5>
                <p><?= $data->description ?></p>
            </div>
        </div>
    </a>
</div>