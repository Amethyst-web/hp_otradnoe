<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 01.12.2015
 * Time: 23:07
 */?>
<main>
    <div class="container-fluid no_padding">
        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators ">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
            </ol>
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="active item">
                    <img src="img/top_slider/header_bg.jpg" class="img-responsive w100" alt="Image">
                </div>
                <div class="item">
                    <img src="img/top_slider/header_bg_2.jpg" class="img-responsive w100" alt="Image">
                </div>
            </div>
            <div class="addr text-center simple_text">
                <p>ул. декабристов, д.17</p>
                <p class="mb0">вс-чт, вс 15:00-00:00</p>
                <p>пт-сб 15:00 - до последнего гостя</p>
                <p>8-(964)-703-09-22</p>
            </div>
        </div>
    </div>
    <div class="container-fluid no_padding main_block">
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="h1" id="about"><span class="color_black">О</span> <span class="color_red">нас</span></p>
                <hr class="line">
                <div class="text">
                    <p>Клуб ценителей кальянной культуры.Разнообразие кальянных миксов, проведение мастер-классов, дегустация фирменных кальянов, лаундж, кинопоказы, настолки, музыка и интересные встречи!</p>
                    <p>Аутентичный китайский чай. Наши мастера освежают коллекцию дважды в год, привозя из Китая настоящие сокровища в виде чайного листа. Кальяны и табак со всего мира от ведущих мастеров своего дела. Регулярные мероприятия для членов клуба, тренинги и обучение.</p>
                </div>
            </div>
        </div>
    </div>
<div class="container-fluid no_padding main_block black_img_bg">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p class="h1" id="news">Последние <span class="color_red">новости</span></p>
            <hr class="line">
            <div class="news_slider">
                <div id="carousel_news" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators hidden">
                        <li data-target="#carousel_news" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel_news" data-slide-to="1"></li>
                    </ol>
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item" data-toggle="modal" data-target="#modal_new_1">
                            <img class="drink center-block" src="img/news_slider/dirnk.png" height="115" width="115" class="center-block" alt="Image">
                            <p class="text-center">Закажите китайский чай
                            <br> второй в подарок</p>
                        </div>
                        <div class="item" data-toggle="modal" data-target="#modal_new_2">
                            <img class="drink center-block" src="img/news_slider/dirnk2.png" height="115" width="115" class="center-block" alt="Image">
                            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lorem. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid no_padding main_block bg_black">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p class="h1" id="menu">Наше <span class="color_red">меню</span></p>
            <hr class="line">
            <div class="menu center-block clearfix">
                <a href="" data-toggle="modal" data-target="#modal_chai">
                    <div class="chai">Чаи</div>
                    <img src="img/chai.jpg" height="338" width="450" alt=""></a>
                <a href="" data-toggle="modal" data-target="#modal_kalyanu">
                    <div class="kalyanu">Кальяны</div><img src="img/kalyanu.jpg" height="338" width="450" alt=""></a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid no_padding main_block">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p class="h1"><span class="color_black">Наша</span> <span class="color_red">галерея</span></p>
            <hr class="line">
            <div class="gallery center-block">
                <a href="/img/gallery/big/one_img_big.jpg" data-lightbox="roadtrip">
                    <img src="/img/gallery/small/one_img_sm.jpg" alt="Image">
                </a>
                <a href="/img/gallery/big/1.jpg" data-lightbox="roadtrip">
                    <img src="/img/gallery/small/1.jpg" alt="Image">
                </a>
                <a href="/img/gallery/big/2.jpg" data-lightbox="roadtrip">
                    <img src="/img/gallery/small/2.jpg" alt="Image">
                </a>
                <a href="/img/gallery/big/3.jpg" data-lightbox="roadtrip">
                    <img src="/img/gallery/small/3.jpg" alt="Image">
                </a>
                <a href="/img/gallery/big/4.jpg" data-lightbox="roadtrip">
                    <img src="/img/gallery/small/4.jpg" alt="Image">
                </a>
                <a href="/img/gallery/big/5.jpg" data-lightbox="roadtrip">
                    <img src="/img/gallery/small/5.jpg" alt="Image">
                </a>
            </div>
            <div class="gallery_slider"></div>
        </div>
    </div>
</div>
<div class="container-fluid no_padding main_block bg_black">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="h1" id="cont">Наши <span class="color_red">контакты</span></p>
                <hr class="line">
                <div class="cont text-center simple_text">
                    <p>ул. декабристов, д.17</p>
                    <br>
                    <p class="mb0">вс-чт, вс 15:00-00:00</p>
                    <p>пт-сб 15:00 - до последнего гостя</p>
                    <p>8-(964)-703-09-22</p>
                </div>
                <div class="social center-block">
                    <a href=""><img src="img/facebook.png" height="29" width="16" alt="" class="facebook"></a>
                    <a href=""><img src="img/instagram.png" height="42" width="42" alt="" class="instagramm"></a>
                    <a href=""><img src="img/vk.png" height="33" width="57" alt="" class="vk"></a>
                </div>
                <div class="gallery_slider"></div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid no_padding map" id="map">
    <img src="img/karta.jpg"class="img-responsive w100" alt="Image">
</div>
<!--    <div class="container bg_zakaz">-->
<!--        <div class="row">-->
<!--            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                <p class="h1"><span class="color_black">Заказать</span> <span class="color_red">столик</span></p>-->
<!--                <hr class="line">-->
<!--                <div class="row">-->
<!--                    <form action="/" class="zakaz_form center-block">-->
<!--                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pl_25">-->
<!--                            <input placeholder="Ваше имя" type="text" class="form-control">-->
<!--                            <input placeholder="Ваше почта" type="text" class="form-control">-->
<!--                        </div>-->
<!--                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pl_25">-->
<!--                            <input placeholder="Ваш телефон" type="text" class="form-control">-->
<!--                            <input placeholder="Дата регистрации" type="text" class="form-control">-->
<!--                        </div>-->
<!--                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl_25">-->
<!--                            <textarea placeholder="Ваше сообщение" class="form-control comment_input"></textarea>-->
<!--                        </div>-->
<!---->
<!--                        <button type="submit" class="btn center-block">Заказать</button>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<?php    include_once '_modal.php';?>

</main>


