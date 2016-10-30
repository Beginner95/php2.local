<?php
require __DIR__ . '/../autoload.php';

$parts = explode('/', $_SERVER['REQUEST_URI']);
$ctrlRequest = !empty($parts[1]) ? $parts[1] : 'Index';
$ctrlClassName = '\App\Controllers\\' . $ctrlRequest;
$actRequest = !empty($parts[2]) ? $parts[2] : 'Default';
$ctrl = new $ctrlClassName;
try {
    $ctrl->action($actRequest);
} catch (Exception $e){
    echo 'Error: ' . $e->getMessage();
}