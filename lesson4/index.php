<?php
require __DIR__ . '/autoload.php';

$parts = explode('/', $_SERVER['REQUEST_URI']);
$ctrlRequest = !empty($parts[1]) ? $parts[1] : 'Index';
$ctrlClassName = '\App\Controllers\\' . $ctrlRequest;
$ctrl = new $ctrlClassName;
$actRequest = !empty($parts[2]) ? $parts[2] : 'Default';
$actMethodName = 'action' . $actRequest;
$ctrl->$actMethodName();