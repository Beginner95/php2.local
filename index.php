<?php
require __DIR__ . '/autoload.php';

$view = new App\View();

$parts = explode('/', $_SERVER['REQUEST_URI']);
$ctrlRequest = !empty($parts[1]) ? $parts[1] : 'Index';
$ctrlClassName = '\App\Controllers\\' . $ctrlRequest;
$actRequest = !empty($parts[2]) ? $parts[2] : 'Default';

$ctrl = new $ctrlClassName;

try {
    $ctrl->action($actRequest);
} catch (\App\DbException $e) {
    $view->error = $e->getMessage();
    $view->display(__DIR__ . '/templates/error.php');
} catch (\App\NotFoundException $e) {
    $view->error = $e->getMessage();
    $view->display(__DIR__ . '/templates/error.php');
}
/*if (false === $ctrl->action($actRequest)) {
    exit('Доступ закрыт');
}*/