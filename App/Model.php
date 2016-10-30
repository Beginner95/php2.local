<?php

namespace App;

abstract  class Model
{
    public $id;

    public static function findAll()
    {
        $db = new Db();
        $data = $db->query(
            'SELECT asdf FROM ' . static::$table,
            [],
            static::class
        );
        return $data;
    }
    
    

    public static function findById($id)
    {
        $db = new Db();
        $data = $db->query(
            'SELECT * FROM ' . static::$table . ' WHERE id=:id',
            [':id' => $id],
            static::class
        );
        return $data[0] ?? false;
    }
    
    

    public static function findLast($limit)
    {
        $db = new Db();
        $data = $db->query(
            'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $limit,
            [],
            static::class
        );
        return $data;
    }

    public function isNew()
    {
        return empty ($this->id);
    }

    protected function insert()
    {
        $columns = [];
        $binds = [];
        $data = [];
        foreach ($this as $column => $value) {
            if ('id' == $column) {
                continue;
            }
            $columns[] = $column;
            $binds[] = ':' . $column;
            $data[':' . $column] = $value;
        }

        $sql = '
            INSERT INTO ' . static::$table . '
            (' . implode(', ', $columns ) .')
            VALUES
            (' . implode(', ', $binds ) . ')
        ';
        $db = new Db();
        $db->execute($sql, $data);

        $this->id = $db->lastInsertId();
    }

    protected function update()
    {
        $columns = [];
        $data = [];
        $data[':id'] = $this->id;
        foreach ($this as $column => $value) {
            if ('id' == $column) {
                continue;
            }
            $columns[] = $column . '=:' . $column;
            $data[':' . $column] = $value;
        }

        $sql = '
            UPDATE ' . static::$table . '
            SET ' . implode(', ', $columns) . '
            WHERE id=:id
        ';

        $db = new Db();
        $db->execute($sql, $data);
    }

    public function save()
    {
        if (false === $this->isNew()) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    public function delete()
    {
        if (false === $this->isNew()) {
            $data = [':id' => $this->id];
            $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
            $db = new Db();
            $db->execute($sql, $data);
        }
    }

    public function fill(array $data)
    {
        //
    }
}