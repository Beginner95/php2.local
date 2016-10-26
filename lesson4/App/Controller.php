<?php

namespace App;

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
            exit('Доступ закрыт');
        }
        $actMethodName = 'action' . $action;

    }

    private function access()
    {
        $sec = date('s');
        if ($sec%2 == 0) {
            return true;
        }
        return false;
    }
}