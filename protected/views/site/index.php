<?php
/**
 * @var $this SiteController
 * @var $pages Pages[]
 * @var $productCategories ProductCategories[]
 * @var $projectCategories ProductCategories[]
 * @var $products Products[]
 * @var $slider Slideshow[]
 */
$slideUrl = Yii::app()->getBaseUrl(true).'/uploads/slideshow/';
?>
<section id="top" class="active">
    <div class="owl-slider owl-carousel owl-theme" id="slider">
        <?php foreach ($slider as $slide): if($slide->image && is_file(Yii::getPathOfAlias('webroot').'/uploads/slideshow/'.$slide->image)):?>
            <div class="slider-item">
                <div class="slider-image" style="background-image: url('<?= $slideUrl.$slide->image ?>')"></div>
            </div>
        <?php endif;endforeach; ?>
    </div>
    <div class="slider-overlay-elements">
        <div class="container">
            <div class="logo-box pull-left">
                <a href="#"><div class="logo"></div></a>
            </div>
            <ul class="nav navbar">
                <li><a href="#top"><span data-hover="home">home</span></a></li>
                <li><a href="#menu"><span data-hover="menu">menu</span></a></li>
                <li><a href="#about"><span data-hover="about us">about us</span></a></li>
                <li><a href="#contact"><span data-hover="contact us">contact us</span></a></li>
            </ul>

            <div class="get-started-box">
                <p><strong>Restaurant and Catering</strong>Great food doesn't have to cost the earth Call to get a quote
                    <a href="#menu" class="ease-link">get start</a>
                </p>
            </div>
        </div>
    </div>
</section>
<section id="about" class="flex">
    <div class="right-box red">
        <div class="chef-box"></div>
        <div class="open-time-box">
            <b>OPENING HOURS</b>
            <?= SiteSetting::getOption('opening_hours') ?>
        </div>
        <?php if($pages[1]->image && is_file(Yii::getPathOfAlias('webroot').'/uploads/pages/'.$pages[1]->image)):?>
            <div class="owner-image">
                <img src="<?= Yii::app()->getBaseUrl(true).'/uploads/pages/'.$pages[1]->image ?>">
            </div>
        <?php endif; ?>
        <div class="text-box">
            <h2><?= strip_tags($pages[1]->title);?></h2><p class="text-normal"><?= strip_tags($pages[1]->summary);?></p>
        </div>
    </div>
    <div class="left-box">
        <div class="text-box">
            <h2><span class="full red">about</span><span>DARBAND</span><span class="light text-normal">Restaurant</span></h2><p class="text-normal"><?= strip_tags($pages[0]->summary);?></p>
        </div>
    </div>
</section>
<section id="menu" class="flex flex-left height-auto">
    <div class="navigation">
        <div class="menu visible-xs">
            <a class="menu-trigger" href="#"></a>
        </div>
        <ul class="nav navbar nav-left">
            <?php foreach($productCategories as $key => $category):?>
                <li<?= $key === 0?' class="active"':'' ?>><a href="#" data-toggle="tab" data-target="#menu-<?= $category->id ?>-tab"><span><?= $category->title?></span></a></li>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="flex-inner">
        <div class="flex-col tab-content">
            <?php foreach ($productCategories as $k => $category):?>
                <div class="tab-pane fade<?= $k === 0?' active in':''?>" id="menu-<?= $category->id ?>-tab">
                    <div class="menu-list" id="menu-<?= $category->id ?>-masonry">
                        <?php
                        $cr = Products::validQuery()->compare('cat_id', $category->id);
                        $products = Products::model()->findAll($cr);
                        foreach ($products as $key => $product):
                            $this->renderPartial('products.views.manage._item_view', array('data' => $product));
                        endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="navigation">
        <?php if(SiteSetting::getOption('menu_pdf')): ?>
            <a class="navigation-bottom btn-red" href="<?= $this->createUrl('/menu/download') ?>">
                <small>menu for</small> <span class="bolder">download</span>
            </a>
        <?php endif; ?>
    </div>
</section>