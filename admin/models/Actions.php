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
    public $shortText;
    public $text;
    public $startAt;
    public $endAt;
    public $forever;
    public $visible;
    public $removed;
    public $changedBy;
    public $createdAt;
    public $updatedAt;

    public static function getTableName() {
        return 'actions';
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
            $this->shortText,
            $this->text,
            $this->startAt,
            $this->endAt,
            $this->forever,
            $this->visible,
            $this->removed,
            $this->changedBy
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
            $this->shortText,
            $this->text,
            $this->startAt,
            $this->endAt,
            $this->forever,
            $this->visible,
            $this->removed,
            $this->changedBy,
            $this->id
        ]);
    }
}