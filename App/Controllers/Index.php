<?php

namespace App\Controllers;

use App\Controller;
use App\Model\Article;

class Index
    extends Controller
{
    public function actionDefault()
    {
        try {
            $news = Article::findAll();
            $this->view->news = $news;
            $this->view->display(__DIR__ . '/../../templates/view_news.php');
        } catch (\Exception $e) {
            $this->view->error = $e->getMessage();
            $this->view->display(__DIR__ . '/../../templates/error.php');

        }


    }
}