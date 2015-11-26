<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 22.11.2015
 * Time: 16:34
 */

namespace models;

use BaseModel;
use Exception;

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

    public static function getTableName() {
        return 'users';
    }

    public function generateToken() {
        $this->authTime = time();
        $this->token = md5($this->authTime.$this->salt.$this->id);
        $this->save();
    }

    public function save() {
        return ($this->id !== null && $this->id > 0) ? $this->update() : $this->insert();
    }

    private function update() {
        $prep = static::$con->prepare('UPDATE users SET email = ?, name = ?, pass = ?, salt = ?, token = ?, auth_time = ?, removed = ? WHERE id = ?');
        return $prep->execute([
            $this->email,
            $this->name,
            $this->pass,
            $this->salt,
            $this->token,
            $this->authTime,
            $this->removed,
            $this->id
        ]);
    }

    private function insert() {
        throw new Exception('Функция '.__FUNCTION__.' не описана');
    }
}