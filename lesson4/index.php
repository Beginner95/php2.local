<?php
require __DIR__ . '/autoload.php';
$data = \App\Model\Article::findLast(3);
$view = new \App\View();
$view->news = $data;
$view->display(__DIR__ . '/templates/view_news.php');