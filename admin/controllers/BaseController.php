<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 18:28
 */

namespace controllers;


use models\Users;

abstract class BaseController
{
    protected $user;
    protected function render($layout = 'layout', $view = null){
        if($view === null) $view = $_GET['action'];
        $content = INCLUDE_PATH.'views/'.$_GET['controller'].'/'.$view.'.php';
        if(!file_exists($content)){
            die('Такого шаблона не существует: '.$content);
        }
        require INCLUDE_PATH.'views/'.$layout.'.php';
    }

    protected function errorJSONResponse($error, $code = 500){
        header('Content-type: application/json');
        return json_encode([
            'result' => false,
            'code' => $code,
            'error' => $error
        ]);
    }

    protected function successJSONResponse($message, $data = [], $code = 200){
        header('Content-type: application/json');
        return json_encode([
            'result' => true,
            'code' => $code,
            'message' => $message,
            'data' => $data
        ]);
    }

    protected function redirect($link, $basePath = '/admin'){
        header('Location: '.$basePath.$link);
        exit;
    }

    protected function checkAuth(){
        if(!isset($_COOKIE['UID'], $_COOKIE['token'])) return false;
        $UID = $_COOKIE['UID'];
        $token = $_COOKIE['token'];
        $this->user = new Users($UID);
        if($this->user && $this->user->checkAuth($token)){
            return true;
        } else {
            $this->user = null;
            return false;
        }
    }
}