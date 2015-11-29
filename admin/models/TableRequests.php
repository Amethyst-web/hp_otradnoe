<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 29.11.2015
 * Time: 22:54
 */

namespace models;

use BaseModel;
use DateTime;

class TableRequests extends BaseModel
{
    public $name;
    public $email;
    public $phone;
    public $date;
    public $createdAt;

    public static function getTableName() {
        return 'table_requests';
    }

    public static function getAllForPeriod(DateTime $from = null, DateTime $to = null){
        if($from === null && $to === null){
            return static::getAll();
        }
        $conditions = [];
        $args = [];
        if($from !== null){
            $conditions[] = 'DATE(date) >= ?';
            $args[] = $from->format('Y-m-d');
        }
        if($to !== null){
            $conditions[] = 'DATE(date) <= ?';
            $args[] = $to->format('Y-m-d');
        }
        $prep = static::$con->prepare('SELECT * FROM '.static::getTableName().' WHERE '.join($conditions, ' AND '));
        $prep->execute($args);
        return $prep->fetchAll();
    }

    protected function update() {
        $prep = static::$con->prepare('UPDATE '.static::getTableName().' SET email = ?, name = ?, phone = ?, date = ? WHERE id = ?');
        return $prep->execute([
            $this->email,
            $this->name,
            $this->phone,
            $this->date,
            $this->id
        ]);
    }

    protected function insert() {
        $prep = static::$con->prepare('INSERT INTO '.static::getTableName().' (email, name, phone, date) VALUES (?,?,?,?)');
        return $prep->execute([
            $this->email,
            $this->name,
            $this->phone,
            $this->date
        ]);
    }

    public static function GetAll(){

    }
}