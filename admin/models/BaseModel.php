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
    /** @var Connection $con */
    protected static $con;

    public function __construct($id = null)
    {
        static::getConnection();
        if($id !== null){
            $prep = static::$con->prepare('SELECT * FROM '.static::getTableName().' WHERE id = ? LIMIT 1');
            $prep->execute([$id]);
            $result = $prep->fetch();
            $this->parseArray($result);
        }
    }

    public static function getOne($params = []){
        static::getConnection();
        $query = 'SELECT * FROM '.static::getTableName();
        if(sizeof($params) !== 0) {
            $filterString = join(' = ? AND ', array_keys($params)).' = ?';
            $query .= ' WHERE '.$filterString;
        }
        $query.=' LIMIT 1';
        $prep = static::$con->prepare($query);
        $prep->execute(array_values($params));
        return $prep->fetchObject(__CLASS__);
    }

    protected static function getConnection(){
        if(!isset(static::$con)){
            static::$con = new Connection();
        }
        return static::$con;
    }

    private function parseArray($values = []){
        foreach($values as $key => $value){
            if(property_exists(__CLASS__, $key)){
                $this->{$key} = $value;
            }
        }
    }
}