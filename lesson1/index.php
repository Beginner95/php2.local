<?php
require __DIR__ . '/autoload.php';
$data = \App\Model\Article::getNewsLimit(3);
$view = new \App\View();
$view->assing('news', $data);
$view->display(__DIR__ . '/templates/view_news.php');