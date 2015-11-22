<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 17:51
 */

namespace core;


class Autoload
{
    public static function load()
    {
        require INCLUDE_PATH.'config/App.php';
        require INCLUDE_PATH.'config/DB.php';
        require INCLUDE_PATH.'controllers/BaseController.php';
        require INCLUDE_PATH.'models/BaseModel.php';
    }
}