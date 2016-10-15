<?php

namespace App;

class Config
    extends Singleton
{
    public $data;
    public function __construct(){
        return $this->data =  include __DIR__ . '/../config.php';
    }
}