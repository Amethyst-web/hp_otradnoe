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
    <script type="text/javascript" src="dist/js/main.js"></script>
    <script type="text/javascript" src="dist/bootstrap/js/bootstrap.min.js"></script>
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
                <li><a href="#">О нас</a></li>
<!--                <li><a href="#">Новости</a></li>-->
<!--                <li><a href="#">Меню</a></li>-->
                <li><a href="#">Контакты</a></li>
<!--                <li><a href="#">Как нас найти</a></li>-->
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
</body>
</html>