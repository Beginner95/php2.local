<?php

require __DIR__ . '/../autoload.php';
$article = new \App\Model\Article();
$article->title = 'Title';
$article->lead = 'Text more';
$article->author = 'Vaha';
$article->insert();
var_dump($article->save());