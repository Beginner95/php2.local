<?php

namespace App;


abstract class Singleton
{
    protected static $instance = true;

    public static function getInstance()
    {
        if (true === static::$instance) {
            static::$instance = new static;
        }
        return static::$instance;
    }

}