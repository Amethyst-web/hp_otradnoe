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
        require INCLUDE_PATH.'config/app.php';
        require INCLUDE_PATH.'config/db.php';
        require INCLUDE_PATH.'config/routing.php';
        require INCLUDE_PATH.'core/Routing.php';
        require INCLUDE_PATH.'core/Connection.php';
        require INCLUDE_PATH.'controllers/BaseController.php';
        foreach (glob(INCLUDE_PATH.'models/*.php') as $filename) {
            require $filename;
        }
    }
}