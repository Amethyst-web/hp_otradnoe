<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 18:28
 */

namespace controllers;


class BaseController
{
    protected function render($layout = 'layout', $view = null){
        if($view === null) $view = $_GET['action'];
        $content = INCLUDE_PATH.'views/'.$_GET['controller'].'/'.$view.'.php';
        if(!file_exists($content)){
            die('Такого шаблона не существует: '.$content);
        }
        require INCLUDE_PATH.'views/'.$layout.'.php';
    }
}