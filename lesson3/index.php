<?php
require __DIR__ . '/autoload.php';

$author = \App\Model\Author::findAll();
$data = \App\Model\Article::findLast(3);
$view = new \App\View();
$view->assing('news', $data);
$view->display(__DIR__ . '/templates/view_news.php');