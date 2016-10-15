<?php

require __DIR__ . '/../autoload.php';

$data = \App\Model\Article::findAll();
$view = new \App\View();
$view->assing('news', $data);
$view->display(__DIR__ . '/templates/index.php');