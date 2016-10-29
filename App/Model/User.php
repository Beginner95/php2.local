<?php

namespace App\Model;

use App\Model;

class User
    extends Model
{
    public static $table = 'users';
    public $id;
    public $email;
    public $login;
    public $name;
    public $age;
}