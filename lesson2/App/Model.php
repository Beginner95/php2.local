<?php

namespace App;

abstract  class Model
{
    public $id;

    public static function findAll()
    {
        $db = new Db();
        $data = $db->query(
            'SELECT * FROM ' . static::$table,
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
        if (!empty($data[0])) {
            return $data[0];
        } else {
            return false;
        }
    }

    public function isNew()
    {
        return empty ($this->id);
    }

    public function insert()
    {
        if ($this->isNew()) {
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

    }

    public function update()
    {

    }
}