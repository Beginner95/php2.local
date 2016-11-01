<?php

namespace App\Controllers;

use App\Controller;
use App\Model\Article;
use App\NotFoundException;

class News
    extends Controller
{
    public function actionOne()
    {
        $article = Article::findById((int)$_GET['id']);
        if (false !== $article) {
            $this->view->article = $article;
            $this->view->display(__DIR__ . '/../../templates/view_article.php');
        } else {
            throw new NotFoundException('Ошибка 404 - не найдено');
        }
    }
}