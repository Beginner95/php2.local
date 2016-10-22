<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Новости</title>
    <link rel="stylesheet" type="text/css" href="/lesson2/css/style.css">
</head>
<body>
<h1>Новости</h1>
<a href="/lesson2/admin/edit.php">Добавить новость</a>
<?php if (!empty($news)) { ?>
    <?php foreach ($news as $article) : ?>
        <article>
            <h3><?php echo $article->title; ?></h3>
            <p><?php echo $article->lead; ?></p>
            <p class="author">Автор: <?php echo $article->author; ?></p>
            <a href="/lesson2/admin/delete.php?id=<?php echo $article->id; ?>">Удалить</a>
            <a href="/lesson2/admin/edit.php?id=<?php echo $article->id; ?>">Рудактировать</a>
        </article>
    <?php endforeach; ?>
<?php } else { ?>
    <article>
        <p>Нет новостей</p>
    </article>
<?php } ?>
</body>
</html>