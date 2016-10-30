<?php
namespace App\Controllers;

use App\Controller;
use App\Model\Article;
class Admin
    extends Controller
{
    public function getArticle()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $article = Article::findById($id);
        } else {
            $article = new Article();
        }
        return $article;
    }

    public function actionSave()
    {
        $article = $this->getArticle();
        if (!empty($_POST)) {
            $article->title = strip_tags($_POST['title']);
            $article->lead = strip_tags($_POST['lead']);
            $article->author_id = strip_tags($_POST['author_id']);
            $article->save();
            header('Location: /admin');
        }
    }
    
    public function actionDelete()
    {
        $article = $this->getArticle();
        if (null !== $article->id) {
            $article->delete();
            header('Location: /admin');
        }
    }

    public function actionDefault()
    {
        $news = Article::findAll();
        $this->view->news = $news;
        $this->view->display(__DIR__ . '/../../admin/templates/index.php');
    }

    public function actionEdit()
    {
        $this->view->article = $this->getArticle();
        $this->view->display(__DIR__ . '/../../admin/templates/form.php');
    }
}