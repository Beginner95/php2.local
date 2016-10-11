<?php

require __DIR__ . '/autoload.php';

//$users = \App\Model\User::findAll();
$users = \App\Model\User::findById(2);

echo '<pre>';
var_dump($users);