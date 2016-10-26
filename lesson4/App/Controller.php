<?php

namespace App;


abstract class Controller
{
    public function action($action)
    {
        if (false === $action) {
            $this->access();
        } else {
            echo 'Tetst';
        }

    }

    public function access()
    {

    }
}