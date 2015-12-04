<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 01.12.2015
 * Time: 21:28
 */

namespace models;


class Actions extends BaseModel
{
    public $name;
    public $alias;
    public $short_text;
    public $text;
    public $start_at;
    public $end_at;
    public $forever;
    public $visible;
    public $removed;
    public $changed_by;
    public $created_at;
    public $updated_at;

    public static function getTableName() {
        return 'actions';
    }

    public static function getAllNotRemoved(){
        static::getConnection();
        return static::$con->executeQuery('SELECT * FROM '.static::getTableName().' WHERE removed = 0');
    }

    public static function getActive(){
        static::getConnection();
        return static::$con->executeQuery('SELECT * FROM '.static::getTableName().' WHERE ((start_at <= now() AND end_at >= now()) OR forever = 1) AND (removed = 0 AND visible = 1)');
    }

    protected function insert(){
        $this->id = static::$con->insert('INSERT INTO '.static::getTableName().' (
                name,
                alias,
                short_text,
                text,
                start_at,
                end_at,
                forever,
                visible,
                removed,
                changed_by) VALUES (?,?,?,?,?,?,?,?,?,?)', [
            $this->name,
            $this->alias,
            $this->short_text,
            $this->text,
            $this->start_at,
            $this->end_at,
            $this->forever,
            $this->visible,
            $this->removed,
            $this->changed_by
        ]);
        return $this->id !== false;
    }

    protected function update(){
        $prep = static::$con->prepare('UPDATE '.static::getTableName().'
            SET name = ?,
                alias = ?,
                short_text = ?,
                text = ?,
                start_at = ?,
                end_at = ?,
                forever = ?,
                visible = ?,
                removed = ?,
                changed_by = ?
            WHERE id = ?');
        return $prep->execute([
            $this->name,
            $this->alias,
            $this->short_text,
            $this->text,
            $this->start_at,
            $this->end_at,
            $this->forever,
            $this->visible,
            $this->removed,
            $this->changed_by,
            $this->id
        ]);
    }
}