<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 22.11.2015
 * Time: 13:07
 */

namespace controllers;

use models\Users;

class AuthController extends BaseController
{
    protected function render($layout = 'authLayout', $view = null){
        parent::render($layout, $view);
    }

    public function indexAction(){
        if(isset($_COOKIE['token'], $_COOKIE['id'])){

        }
        $this->render();
    }

    public function loginAction(){
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            $this->errorJSONResponse('Метод не доступен с этим HTTP-методом', 403);
        }
        if(!isset($_POST['email'], $_POST['pass'])){
            $this->errorJSONResponse('Не хватает одного из параметров', 500);
        }
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        /** @var Users $user */
        $user = Users::getOne(['email' => $email]);
        if(!$user || ($user->pass !== md5($user->salt.$pass.$user->salt))){
            $this->errorJSONResponse('Такого пользователя не существует', 501);
        }
        $user->generateToken();
    }
}