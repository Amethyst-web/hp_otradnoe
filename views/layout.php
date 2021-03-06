<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 01.12.2015
 * Time: 23:07
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=1200, user-scalable=0"/>
    <meta name='yandex-verification' content='767a7bfdf8b5f5cb' />
    <meta property="og:title" content="Кальянная на Отрадной"/>
    <meta property="og:image" content="/img/gallery/big/13.jpg">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content= "http://hookah-msk.ru" />
    <meta property="og:description" content="Новая кальянная на Отрадной около метро с широким ассортиментом изысканных вкусов табака и сортов китайского чая"/>
    <meta name="description" content="Новая кальянная на Отрадной около метро с широким ассортиментом изысканных вкусов табака и сортов китайского чая">
    <meta name="keywords" content="отрадное, кальянная, кальян, метро отрадное, hookah, китайский чай, чай, кальянная рядом с метро, hookah, moscow, hookah place, china, tea, china tea, hookah near metro, otradnoe">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/dist/bootstrap/css/bootstrap.min.css" type="text/css" />
    <link href="/dist/plugins/jquery-scrollbar/css/jquery.scrollbar.css" rel="stylesheet">
    <link rel="stylesheet" href="/dist/css/style.css" type="text/css" />
    <link rel="stylesheet" href="/dist/css/loader.css" type="text/css" />
    <title>Кальянная на Отрадной</title>
    <link href="/dist/plugins/lightbox/css/lightbox.css" rel="stylesheet">
    <?php include 'counters.php';?>
    <script type="text/javascript" src="/dist/js/jquery-2.1.4_min.js"></script>
    <script src="/dist/plugins/jquery-scrollport/js/scrollport.min.js" type="text/javascript"></script>
</head>
<body>
<div id="loader">
    <div>
        <p>Загрузка</p>
    </div>
</div>
<script type="text/javascript" src="/dist/js/loader.js"></script>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#main">Главная</a></li>
                <li><a href="#about" data-scrollport>О нас</a></li>
<!--                <li><a href="#news" data-scrollport>Новости</a></li>-->
                <li><a href="#menu" data-scrollport>Меню</a></li>
                <li><a href="#gallery" data-scrollport>Галерея</a></li>
                <li><a href="#cont" data-scrollport>Контакты</a></li>
                <li><a href="#bron" data-scrollport>Бронь</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<?php include $content;?>
<footer>
    <div class="container">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <a href="http://amethyst-ws.ru" target="_blank" title="Веб-студия Аметист"><img src="/img/Logo.png" alt="logo" style="margin-top: -10px;"></a>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <img src="/img/18plus.png" alt="" class="center-block">
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div class="social center-block">
<!--                <a href=""><img width="16" height="29" class="facebook" alt="" src="/img/facebook.png"></a>-->
<!--                <a href=""><img width="32" height="32" class="instagramm" alt="" src="/img/instagram.png"></a>-->
                <a href="http://vk.com/hpotradnoe" target="_blank"><img width="56" height="32" class="vk" alt="" src="/img/vk.png"></a>
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <p class="pull-right footer_logo"><img src="/img/footer_img.png" height="35" width="200" class="img-responsive" alt="Image"></p>
        </div>
    </div>
</footer>


<script type="text/javascript" src="/dist/bootstrap/js/bootstrap.min.js"></script>
<script src="/dist/plugins/lightbox/js/lightbox.js"></script>

<script src="/dist/plugins/jquery-scrollbar/js/jquery.scrollbar.min.js"></script>

<script src="/dist/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script src="/dist/plugins/jquery-validation/js/localization/messages_ru.min.js"></script>

<script src="/dist/plugins/jquery-inputmask/js/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBskTU5wfMzwFCR7QNRv-H-1xWBOSqLe28&callback=initMap" async defer></script>-->
</body>
</html>
