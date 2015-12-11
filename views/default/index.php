<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 01.12.2015
 * Time: 23:07
 */?>
<main>
    <div id="main" class="container-fluid no_padding">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators top hidden">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
                <li data-target="#carousel" data-slide-to="3"></li>
                <li data-target="#carousel" data-slide-to="4"></li>
            </ol>
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="active item">
                    <img src="/img/top_slider/bg5.jpg" class="img-responsive w100" alt="Image">
                </div>
                <div class="item">
                    <img src="/img/top_slider/bg4.jpg" class="img-responsive w100" alt="Image">
                </div>
                <div class="item">
                    <img src="/img/top_slider/bg1.jpg" class="img-responsive w100" alt="Image">
                </div>
                <div class="item">
                    <img src="/img/top_slider/bg3.jpg" class="img-responsive w100" alt="Image">
                </div>
                <div class="item">
                    <img src="/img/top_slider/bg2.jpg" class="img-responsive w100" alt="Image">
                </div>
            </div>
            <img src="/img/top_slider/logo.png" class="img-responsive w100 logo" alt="Image">
            <div class="addr text-center simple_text">
                <p>ул. декабристов, д.17</p>
                <p class="mb0">вс-чт, вс 15:00-00:00</p>
                <p>пт-сб 15:00 - до последнего гостя</p>
                <p>8 (964) 703-09-22</p>
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
    <?php if(sizeof($this->actions) !== 0):?>
    <div class="container-fluid no_padding main_block black_img_bg">
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="h1" id="news">Последние <span class="color_red">новости</span></p>
                <hr class="line">
                <div class="news_slider">
                    <div id="carousel_news" class="carousel slide" data-ride="carousel">
                        <?php if(sizeof($this->actions) > 1):?>
                        <ol class="carousel-indicators">

                            <?php foreach($this->actions as $key => $action):?>
                                <li data-target="#carousel_news" data-slide-to="<?=$key?>" class="active"></li>
                            <?php endforeach;?>
                        </ol>
                        <?php endif; ?>
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <?php foreach($this->actions as $action):?>
                                <div class="item"
                                     data-toggle="modal"
                                     data-target="#full_action"
                                     data-from="<?=DateTime::createFromFormat('Y-m-d H:i:s',$action['start_at'])->format('d.m.Y')?>"
                                     data-to="<?=!empty($action['end_at']) ? DateTime::createFromFormat('Y-m-d H:i:s',$action['end_at'])->format('d.m.Y') : ''?>"
                                     data-forever="<?=$action['forever']?>"
                                     data-image="<?=\config\App::ACTION_DETAIL_IMAGE_DIR.$action['detail_image']?>"
                                     data-name="<?=$action['name']?>"
                                     data-text="<?=$action['text']?>">
                                    <img class="drink center-block" src="<?=\config\App::ACTION_MAIN_IMAGE_DIR.$action['main_image']?>" height="115" width="115" class="center-block" alt="Image">
                                    <p class="text-center"><?=$action['short_text']?></p>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
<div class="container-fluid no_padding main_block bg_black">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p class="h1" id="menu">Наше <span class="color_red">меню</span></p>
            <hr class="line">
            <div class="menu center-block clearfix">
                <a href="" data-toggle="modal" data-target="#modal_chai">
                    <div class="chai">Чаи</div>
                    <img src="/img/menu1.jpg" height="338" width="450" alt=""></a>
                <a href="" data-toggle="modal" data-target="#modal_kalyanu">
                    <div class="kalyanu">Кальяны</div><img src="/img/menu2.jpg" height="338" width="450" alt=""></a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid no_padding main_block">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p class="h1" id="gallery"><span class="color_black">Наша</span> <span class="color_red">галерея</span></p>
            <hr class="line">
            <div class="gallery center-block scrollbar-inner">
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
                <a href="/img/gallery/big/6.jpg" data-lightbox="roadtrip">
                    <img src="/img/gallery/small/6.jpg" alt="Image">
                </a>
                <a href="/img/gallery/big/7.jpg" data-lightbox="roadtrip">
                    <img src="/img/gallery/small/7.jpg" alt="Image">
                </a>
                <a href="/img/gallery/big/8.jpg" data-lightbox="roadtrip">
                    <img src="/img/gallery/small/8.jpg" alt="Image">
                </a>
                <a href="/img/gallery/big/9.jpg" data-lightbox="roadtrip">
                    <img src="/img/gallery/small/9.jpg" alt="Image">
                </a>
                <a href="/img/gallery/big/10.jpg" data-lightbox="roadtrip">
                    <img src="/img/gallery/small/10.jpg" alt="Image">
                </a>
                <a href="/img/gallery/big/11.jpg" data-lightbox="roadtrip">
                    <img src="/img/gallery/small/11.jpg" alt="Image">
                </a>
                <a href="/img/gallery/big/12.jpg" data-lightbox="roadtrip">
                    <img src="/img/gallery/small/12.jpg" alt="Image">
                </a>
                <a href="/img/gallery/big/13.jpg" data-lightbox="roadtrip">
                    <img src="/img/gallery/small/13.jpg" alt="Image">
                </a>
                <a href="/img/gallery/big/14.jpg" data-lightbox="roadtrip">
                    <img src="/img/gallery/small/14.jpg" alt="Image">
                </a>
            </div>
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
                    <p>8 (964) 703-09-22</p>
                </div>
                <div class="social center-block">
<!--                    <a href=""><img src="img/facebook.png" height="29" width="16" alt="" class="facebook"></a>-->
<!--                    <a href=""><img src="img/instagram.png" height="42" width="42" alt="" class="instagramm"></a>-->
                    <a href="http://vk.com/hpotradnoe" target="_blank"><img src="img/vk.png" height="33" width="57" alt="" class="vk"></a>
                </div>
                <div class="gallery_slider"></div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid no_padding map" id="map">
    <img src="img/karta.jpg"class="img-responsive w100" alt="Image">
</div>
<div class="container-fluid no_padding main_block white_img_bg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="h1" id="bron"><span class="color_black">Заказать</span> <span class="color_red">столик</span></p>
                <hr class="line">
                <div class="row">
                    <form id="zakaz_form" action=zakaz_form"/" class="zakaz_form center-block">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pl_25">
                            <div class="form-group">
                            <input name="name" placeholder="Ваше имя" type="text" class="form-control">
                            </div>
                            <div class="form-group"><input name="email" placeholder="Ваш Email" type="text" class="form-control"></div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pl_25">
                            <div class="form-group"><input name="phone" placeholder="Ваш телефон" type="text" class="form-control"></div>
                            <div class="form-group"><input name="date" placeholder="Дата регистрации" type="text" class="form-control"></div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl_25">
                            <div class="form-group"><textarea name="comment" placeholder="Ваше сообщение" class="form-control comment_input"></textarea></div>
                        </div>
                        <button type="submit" class="btn center-block">Заказать</button>
                        <p class="text-uppercase text-center fs_20 js_any_error hidden"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php    include_once '_modal.php';?>

</main>


