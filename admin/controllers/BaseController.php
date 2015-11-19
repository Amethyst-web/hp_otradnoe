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
    public function render($view){
        $content = 'views/'.$_GET['controller'].'/'.$view.'.php';
        if(!file_exists($content)){
            die('Такого шаблона не существует');
        }
        require '../views/layout.php';
    }
}