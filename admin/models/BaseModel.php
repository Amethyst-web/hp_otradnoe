<?php

/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 18:45
 */
use core\Connection;

class BaseModel
{
    public function __construct($id = null)
    {
        if($id !== null){
            $con = new Connection();
            $prep = $con->prepare('SELECT * FROM '.static::getTableName().' WHERE id = ? LIMIT 1');
            $prep->execute([$id]);
            $result = $prep->fetch();
            $this->parseArray($result);
        }
    }

    public static function getOne($params = []){
        $con = new Connection();
        $query = 'SELECT * FROM '.static::getTableName();
        if(sizeof($params) !== 0) {
            $filterString = join(' = ? AND ', array_keys($params)).' = ?';
            $query .= ' WHERE '.$filterString;
        }
        $query.=' LIMIT 1';
        $prep = $con->prepare($query);
        $prep->execute(array_values($params));
        return $prep->fetchObject(__CLASS__);
    }

    private function parseArray($values = []){
        foreach($values as $key => $value){
            if(property_exists(__CLASS__, $key)){
                $this->{$key} = $value;
            }
        }
    }
}