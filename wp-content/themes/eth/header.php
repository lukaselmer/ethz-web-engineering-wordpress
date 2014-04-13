<!DOCTYPE html>
<html lang="en"><!-- for offline app: manifest="cache.appcache" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>"/>
    <meta name="keywords" content="Hotels, Reviews, Travel, ETH"/>
    <meta name="author" content="Andreas Nufer, Ivo Nussbaumer, Lukas Elmer"/>
    <meta name="robots" content="index, follow"/>

    <!--[if ie]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <![endif]-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--[if lt IE 9]>
    <script async src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/slate/bootstrap.min.css" rel="stylesheet">
    -->

    <title><?php echo get_bloginfo('name'); ?><?php wp_title(); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" charset="utf-8"/>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"><' + '/script>');</script>

    <script src="<?php echo get_template_directory_uri(); ?>/js/jqmt/jquery.multitouch.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jqmt/jquery.multitouch-gestures.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jqmt/jquery.multitouch-draggable.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jqmt/jquery.multitouch-scalable.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jqmt/jquery.multitouch-resizable.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jqmt/jquery.multitouch-rotatable.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jqmt/jquery.multitouch-orientable.js"></script>

    <script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/swipe_navi.js"></script>

    <!--
    Simulate multi touch for development (if you have a multitouch trackpad (such as a Apple MacBook or MagicPad)
    =============================================================================================================
    https://github.com/borismus/MagicTouch
    http://www.html5rocks.com/en/mobile/touch/
     -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/magictouch.js"></script>

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!--
Simulate multi touch for development (if you have a multitouch trackpad (such as a Apple MacBook or MagicPad)
=============================================================================================================
https://github.com/borismus/MagicTouch
http://www.html5rocks.com/en/mobile/touch/
 -->
<object id="tuio" type="application/x-tuio" style="width: 0px; height: 0px;"></object>

<div class="xxs-container">
    <div>Hey there! Would you like to use the local App from the App store? It provides several advantages, check it out!</div>
    <a href="https://play.google.com/store/apps/details?id=com.hcom.android">Android</a>
    <a href="https://itunes.apple.com/us/app/hotels.com-hotel-booking-last/id284971959?mt=8">iPhone</a>
    <a href="http://www.windowsphone.com/en-us/store/app/hotels-com/2768058a-8146-4ede-a146-c22b3d50cdaa">Windows Phone 8</a>
</div>
<div class="container">
    <header>
        <div class="row ">
            <div class="col-md-12">
                <h1><a href="/"><?php echo get_bloginfo('name'); ?></a></h1>
                <div class="description"><?php echo get_bloginfo('description'); ?></div>
            </div>
        </div>
        <nav class="row menu-top">
            <div class="col-md-12">
                <?php wp_nav_menu(array('theme_location' => 'top')); ?>
            </div>
        </nav>
    </header>

    <div class="row">
        <aside class="col-md-content-left">
            <nav class="content-box menu-left">
                <div class="title">Menu</div>
                <?php wp_nav_menu(array('theme_location' => 'left')); ?>
            </nav>
        </aside>

        <section class="col-md-content-center">
            <div class="main-content content-box">
