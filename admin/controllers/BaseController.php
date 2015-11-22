<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 18:28
 */

namespace controllers;


abstract class BaseController
{
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
        die(json_encode([
            'result' => false,
            'code' => $code,
            'error' => $error
        ]));
    }

    protected function successJSONResponse($code, $message, $data = []){
        header('Content-type: application/json');
        die(json_encode([
            'result' => true,
            'code' => $code,
            'message' => $message,
            'data' => $data
        ]));
    }

    protected function redirect($link, $basePath = '/admin'){
        header('Location: '.$basePath.$link);
        exit;
    }

    protected function checkAuth(){
        return false;
    }
}