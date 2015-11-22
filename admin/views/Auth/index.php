<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 22.11.2015
 * Time: 13:09
 */ ?>

<div class="form-box" id="login-box">
    <div class="header">Авторизация</div>
    <form method="post">
        <div class="body bg-gray">
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Email"/>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Пароль"/>
            </div>
        </div>
        <div class="footer">
            <button type="submit" class="btn bg-olive btn-block">Войти</button>

            <p><a href="#">Забыл пароль</a></p>
        </div>
    </form>
</div>
