<?php

namespace App;

abstract  class Model
{
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
}