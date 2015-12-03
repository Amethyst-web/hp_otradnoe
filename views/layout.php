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
    <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="dist/css/style.css" type="text/css" />
    <title>Кальянная на Отрадном</title>
    <link href="dist/plugins/lightbox/css/lightbox.css" rel="stylesheet">

</head>
<body>
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
                <li class="active"><a href="#">Главная</a></li>
                <li><a href="#about">О нас</a></li>
                <li><a href="#news">Новости</a></li>
                <li><a href="#menu">Меню</a></li>
                <li><a href="#cont">Контакты</a></li>
                <li><a href="#map">Как нас найти</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<?php include $content;?>
<footer>
    <div class="container">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <p class="text-uppercase">Все права защищены</p>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <p class="text-center">18+</p>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <p class="pull-right"><img src="img/footer_img.png" height="26" width="167" class="img-responsive" alt="Image"></p>
        </div>
    </div>
</footer>

<script type="text/javascript" src="dist/js/jquery-2.1.4_min.js"></script>
<script type="text/javascript" src="dist/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/js/main.js"></script>
<script src="dist/plugins/lightbox/js/lightbox.js"></script>

<script src="dist/plugins/jquery-scrollbar/js/jquery.scrollbar.min.js"></script>
<link href="dist/plugins/jquery-scrollbar/css/jquery.scrollbar.css" rel="stylesheet">

<script src="dist/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script src="dist/plugins/jquery-validation/js/localization/messages_ru.min.js"></script>

<script src="dist/plugins/jquery-inputmask/js/jquery.inputmask.bundle.min.js" type="text/javascript"></script>

</body>
</html>
