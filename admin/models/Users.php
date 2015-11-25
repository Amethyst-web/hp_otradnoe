<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 22.11.2015
 * Time: 16:34
 */

namespace models;

use BaseModel;

class Users extends BaseModel
{
    public $id;
    public $name;
    public $email;
    public $pass;
    public $salt;
    public $token;
    public $authTime;
    public $removed;
    public $createdAt;

    public static function getTableName(){
        return 'users';
    }
}