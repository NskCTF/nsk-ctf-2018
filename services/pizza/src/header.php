<?php

require_once('function.php');
?>
<!DOCTYPE html>
<html lang="en-US">


<head>
    <meta charset="UTF-8">

    <!-- for mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="format-detection" content="telephone=no" />

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon" />
    <link rel="icon" href="images/favicon.ico" type="image/x-ico" />
    <title>ALBERTOS - Pizza & Restaurant HTML Template</title>

    <link rel='stylesheet' href='rs-slider/css/settings.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/animsition.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/font-awesome.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/simple-line-icons.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/pe-icon-7-stroke.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/flaticon.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/owl.carousel.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/jquery.easy-pie-chart.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/owl.transitions.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/media.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/custom_script.css' type='text/css' media='all' />


    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Merriweather%3A%2C400%7CPatua+One%3A400&amp;ver=1.0.0' type='text/css' media='all' />
    <link href="http://fonts.googleapis.com/css?family=Patua+One:400" rel="stylesheet" property="stylesheet" type="text/css" media="all">
    <script src="js/jquery.min.js"></script>
    <script src="js/ui/js/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="js/ui/development-bundle/ui/jquery.ui.core.js"></script>
    <script src="js/ui/development-bundle/ui/jquery.ui.effect-shake.js"></script>


</head>

<body class="home page-template page-template-template-home page-template-template-home-php page page-id-7">
    <div class="basket" id="baskett">
       <img id="bimg" src="images/basket.png" >

       <div class="basket_list">
        <h2 align="center" style="text-align: center; padding-top: 35px; color: #fcb755;">Корзина</h2>
        <hr>
        <form id='cart' action="checkout.php" method="POST">
            <div id='order' style="color: #d0cece; margin-top: 30px;">
                
            </div>

            <input type="submit" name="buy" style="width: 30%; margin-top: 20px; margin-left: 35%; padding: 10px;" value="Заказать">
            
        </form>
        </div>
        </div>
    <div id="preloader" style="display: none;">
        <div id="status" style="display: none;">&nbsp;</div>
    </div>
    <div class="animsition global-wrapper">
        <div id="header" class="header-wrapper">
            <div class="logo">
                <a href="index.php" title="ALBERTOS - Pizza HTML Theme"><img class="logoImage" src="images/logo.png" alt="ALBERTOS - Pizza HTML Theme" /><img class="logoImageRetina" src="images/logo-retina.png" alt="ALBERTOS - Pizza HTML Theme" /></a>
                <div class="clear"></div>
            </div>
            <div class="menu-wrapper">
                <div class="main-menu">
                    <div class="menu-main-nav-menu-container">
                        <ul id="menu-main-nav-menu" class="sf-menu">
                            <li class="menu-item"><a href="index.php">Home</a></li>
                            <li class="menu-item"><a href="menu.php">Menu</a></li>                      
                            <li class="menu-item"><a href="about.php">About us</a></li>
                            <li class="menu-item"><a href="my_orders.php">My orders</a></li>
                            <li class="menu-item"><a href="Find_order.php">Find order</a></li>
                            <li class="menu-item"><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="menu-icons-inside">
                    <div class="menu-icon menu-icon-mobile"><span class="menu-icon-create"></span></div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="footer">
                
                <div class="footer-content">
                    @ 2018 All rights reserved</div>
            </div>
        </div>

        <div class="mobile-menu-wrapper">
            <div class="menu-main-nav-menu-container">
                <ul id="menu-main-nav-menu-1" class="mobile-menu">
                    <li class="menu-item"><a href="index.html">Home</a></li>
                            <li class="menu-item"><a href="menu.php">Menu</a></li>                      
                            <li class="menu-item"><a href="about.php">About us</a></li>
                </ul>
            </div>
        </div>
       