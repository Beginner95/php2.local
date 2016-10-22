<?php

namespace App\Model;

use App\Model;

/**
 * Class Article
 * @package App\Model
 * @property \App\Model\Author $author
 */
class Article
    extends Model
{
    public static $table = 'news';
    public $id;
    public $title;
    public $lead;
    public $author_id;

    /**
     * @param $var
     * @return bool|null
     */
    public function __get($var)
    {
        if ('author' == $var) {
            return Author::findById($this->author_id);
        }
        return null;
    }

    public function __isset($var)
    {
        if ('author' == $var) {
            return true;
        }
        return false;
    }
}