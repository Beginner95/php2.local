<?php
require __DIR__ . '/autoload.php';

//$conf = new App\Config();
//echo $conf->data['db']['host'];

$data = \App\Model\Article::getNewsLimit(3);
$view = new \App\View();
$view->assing('news', $data);
$view->display(__DIR__ . '/templates/view_news.php');