<?php

namespace App\Model;

use App\Model;

class Article
    extends Model
{
    public static $table = 'news';
    public $id;
    public $title;
    public $lead;
    public $author_id;
}