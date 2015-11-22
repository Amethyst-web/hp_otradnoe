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
    public function render($view = null){
        if($view === null) $view = $_GET['action'];
        $content = INCLUDE_PATH.'views/'.$_GET['controller'].'/'.$view.'.php';
        if(!file_exists($content)){
            die('Такого шаблона не существует');
        }
        require INCLUDE_PATH.'views/layout.php';
    }
}