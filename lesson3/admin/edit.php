<?php
    require __DIR__ . '/../autoload.php';
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $article = \App\Model\Article::findById($id);
    } else {
        $article = new \App\Model\Article();
    }


    if (!empty($_POST)) {
        foreach ($article as $key => $value) {
            if ('id' == $key) {
                continue;
            }
            $article->$key = strip_tags($_POST[$key]);
        }
        $article->save();
        header('Location: /lesson2/admin/index.php');
    }

    $view = new \App\View();
    $view->assing('data', $article);
    $view->display(__DIR__ . '/templates/form_article_edit.php');
