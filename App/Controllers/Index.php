<?php

namespace App\Controllers;

use App\Controller;
use App\Model\Article;

class Index
    extends Controller
{
    public function actionDefault()
    {
        $news = Article::findAll();
        $this->view->news = $news;
        $this->view->display(__DIR__ . '/../../templates/view_news.php');

    }
}