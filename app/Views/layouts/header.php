<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo @$data['seo']->title ?></title>
    <link rel="icon" href="<?php echo finalRoot?>/public/images/logocut.jpg" type="image/icon type">
    <meta name="keywords" content="<?php echo @$data['seo']->keywords ?>"/>
    <meta name="description" content="<?php echo @$data['seo']->description ?>"/>
    <meta name="author" content="<?php echo @$data['seo']->author ?>"/>
    <meta name="robots" content="index,follow"/>
    <!--social telegram-->
    <meta property="og:title" content="<?php echo @$data['seo']->title ?>"/>
    <meta property="og:site_name" content="<?php echo @$data['seo']->title ?>"/>
    <meta property="og:description" content="<?php echo @$data['seo']->description ?>"/>
    <meta property="og:keywords" content="<?php echo @$data['seo']->keywords ?>"/>
    <meta property="og:author" content="<?php echo @$data['seo']->author ?>"/>
    <!--end social telegram-->
    <link rel="stylesheet" href="<?php echo css ?>">
    <link rel="stylesheet" href="<?php echo fontawesome ?>">
    <link rel="stylesheet" href="<?php echo bootstrapCss ?>">
    <link rel="stylesheet" href="<?php echo swiperCss ?>">
</head>
<body>
