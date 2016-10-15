<?php
require __DIR__ . '/../autoload.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int)$_GET['id'];
    \App\Model\Article::findById($id)->delete();
    header('Location: /lesson2/admin/index.php');
}
