<?php
    require __DIR__ . '/../autoload.php';
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $article = \App\Model\Article::findById($id);
    } else {
        $article = new \App\Model\Article();
    }


    if (!empty($_POST)) {
        $article->title = strip_tags($_POST['title']);
        $article->lead = strip_tags($_POST['lead']);
        $article->author = strip_tags($_POST['author']);
        $article->save();
        header('Location: /lesson3/admin/index.php');
    }

    $view = new \App\View();
    $view->assing('data', $article);
    $view->display(__DIR__ . '/templates/form_article_edit.php');
