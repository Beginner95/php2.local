<?php

namespace App\Controllers;

use App\Controller;
use App\Model\Article;

class News
    extends Controller
{
    public function actionOne()
    {
        $article = Article::findById((int)$_GET['id']);
        $this->view->article = $article;
        $this->view->display(__DIR__ . '/../../templates/view_article.php');
    }
}