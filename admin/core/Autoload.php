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
        require '../config/App.php';
        require '../config/DB.php';
        require '../controllers/BaseController.php';
        require '../models/BaseModel.php';
    }
}