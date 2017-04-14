<?php
    $cs        = Yii::app()->clientScript;
    $theme_url = $this->theme_url;
    $cs->registerCssFile($theme_url . '/css/owl.carousel.min.css');
    $cs->registerCssFile($theme_url . '/css/owl.theme.default.min.css');
    $cs->registerCssFile($theme_url . '/css/flexslider.css');
    $cs->registerCssFile($theme_url . '/css/style.css');
    $cs->registerCssFile($theme_url . '/css/content.css');

    $cs->registerCoreScript('jquery', CClientScript::POS_HEAD);
        $cs->registerScriptFile($theme_url . '/js/owl.carousel.min.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile($theme_url . '/js/jquery.flexslider-min.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile($theme_url . '/js/main.js', CClientScript::POS_HEAD);
?>
<!DOCTYPE html>
<html>
<head>
    <meta id="viewport" name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="UTF-8"/>
    <title><?php echo $this->pageTitle; ?></title>
</head>
<body>
<div id="wrapper">
    <?php $this->renderPartial('//layouts/header'); ?>
    <div id="main-content" class="">
        <?php echo $content ?>
    </div>
    <!-- End id main-content -->
    <?php $this->renderPartial('//layouts/footer'); ?>
</div>
<!-- End wrapper -->
</body>
</html>
