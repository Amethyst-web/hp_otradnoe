<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 19:25
 */

namespace core;

use config\DB;
use PDO;
use PDOException;

class Connection
{
    private static $instance;

    public static function getInstance()
    {
        if (null === static::$instance) {
            try {
                static::$instance = new PDO('mysql:host=' . DB::HOST . ';dbname=' . DB::NAME, DB::USER, DB::PASS, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            } catch (PDOException $ex){
                die('Не удалось установить соединение с БД: '.$ex->getMessage());
            }
        }

        return static::$instance;
    }

    protected function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}