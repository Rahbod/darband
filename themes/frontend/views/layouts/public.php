<?php
/* @var $this Controller */
/* @var $content string */
?>
<!DOCTYPE html>
<html lang="fa_ir">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#e12828" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= Yii::app()->request->csrfToken ?>" />
    <meta name="keywords" content="<?= $this->keywords ?>">
    <meta name="description" content="<?= $this->description?> ">
    <link rel="shortcut icon" href="<?php echo Yii::app()->getBaseUrl(true).'/themes/frontend/images/favicon.ico';?>">
    <title><?= (!empty($this->pageTitle)?$this->pageTitle.' | ':'').$this->siteName ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/css/fontiran.css">
    <?php
    $baseUrl = Yii::app()->theme->baseUrl;
    $cs = Yii::app()->getClientScript();
    Yii::app()->clientScript->registerCoreScript('jquery');

    $cs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
    $cs->registerCssFile($baseUrl.'/css/font-awesome.css');
    $cs->registerCssFile($baseUrl.'/css/owl.carousel.min.css');
    $cs->registerCssFile($baseUrl.'/css/owl.theme.default.min.css');
    $cs->registerCssFile($baseUrl.'/css/open-sans.css');
    $cs->registerCssFile($baseUrl.'/css/bootstrap-theme.css');
    $cs->registerCssFile($baseUrl.'/css/responsive-theme.css');

    $cs->registerScriptFile($baseUrl.'/js/bootstrap.min.js', CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl.'/js/owl.carousel.min.js', CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl.'/js/jquery.script.js', CClientScript::POS_END);
    ?>
</head>
<body>
<div class="content">
    <div class="header">
        <div class="nav-trigger">
            <a class="nav-icon" href="#"></a>
        </div>
        <ul class="nav navbar">
            <li><a href="#top"><span data-hover="home">home</span></a></li>
            <li><a href="#menu"><span data-hover="menu">menu</span></a></li>
            <li><a href="#about"><span data-hover="about us">about us</span></a></li>
            <li><a href="#contact"><span data-hover="contact us">contact us</span></a></li>
        </ul>
    </div>
    <?php echo $content;?>
    <?php $this->renderPartial('//partial-views/_footer') ?>
</div>
<a href="#top" class="ease-link top-btn"><i class="icon icon-chevron-up"></i></a>
<?php $this->renderPartial('//partial-views/_flashMessage', array('class' => 'abs-alert'))?>
<?php $this->renderPartial('//partial-views/_popup') ?>
</body>
</html>