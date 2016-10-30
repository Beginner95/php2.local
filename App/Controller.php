<?php

namespace App;

use App\Model\Article;

abstract class Controller
{
    protected $view;
    public function __construct()
    {
        $this->view = new View();
    }

    public function action($action)
    {
        if (false === $this->access()) {
            return false;
        } else {
            $actMethodName = 'action' . $action;
            return $this->$actMethodName();
        }
    }

    private function access()
    {
        $sec = date('s');
        //$rand = rand(1, 2)
        if ($sec == 0) {
            return true;
        }
        return false;
    }
}