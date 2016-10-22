<?php
require __DIR__ . '/autoload.php';
$data = \App\Model\Article::findById((int)$_GET['id']);
$view = new \App\View();
$view->article = $data;
$view->display(__DIR__ . '/templates/view_article.php');