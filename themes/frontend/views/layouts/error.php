<?php
/* @var $this Controller */
/* @var $content string */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#bb0000" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?= $this->keywords ?>">
    <meta name="description" content="<?= $this->description?>">
    <link rel="shortcut icon" href="<?php echo Yii::app()->getBaseUrl(true).'/themes/frontend/images/favicon.ico';?>">
    <title><?= (!empty($this->pageTitle)?$this->pageTitle.' | ':'').$this->siteName ?></title>

    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/fontiran.css">
    <?php
    $baseUrl = Yii::app()->theme->baseUrl;
    $cs = Yii::app()->getClientScript();
    Yii::app()->clientScript->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
    $cs->registerCssFile($baseUrl.'/css/bootstrap-theme.css');
    $cs->registerCssFile($baseUrl.'/css/bootstrap-rtl.min.css');
    $cs->registerCssFile($baseUrl.'/css/error-style.css');
    $cs->registerScriptFile($baseUrl.'/js/bootstrap.min.js', CClientScript::POS_END);
    ?>
</head>
<body>
<?php echo $content;?>
</body>
</html>