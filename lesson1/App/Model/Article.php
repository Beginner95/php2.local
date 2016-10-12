<?php

namespace App\Model;

use App\Db;
use App\Model;

class Article
    extends Model
{
    public static $table = 'news';
    public $id;
    public $title;
    public $text_more;
    public $author;

    public static function getNewsLimit($limit)
    {
        $db = new Db();
        $data = $db->query(
            'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $limit,
            [],
            static::class
        );
        return $data;
    }
}