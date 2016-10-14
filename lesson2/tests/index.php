<?php

require __DIR__ . '/../autoload.php';
$article = new \App\Model\Article();
$article->title = 'Title';
$article->text_more = 'Text more';
$article->author = 'Vaha';
$article->insert();
var_dump($article);

