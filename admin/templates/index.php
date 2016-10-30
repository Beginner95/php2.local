<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Новости</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
<h1>Новости</h1>
<a href="/admin/edit">Добавить новость</a>
<?php if (!empty($news)) { ?>
    <?php foreach ($news as $article) : ?>
        <article>
            <h3><?php echo $article->title; ?></h3>
            <p><?php echo $article->lead; ?></p>
            <?php if (!empty($article->author)) : ?>
                <p class="author">Автор: <?php echo $article->author->name; ?></p>
            <?php endif; ?>
            <a href="/admin/delete/?id=<?php echo $article->id; ?>">Удалить</a>
            <a href="/admin/edit/?id=<?php echo $article->id; ?>">Редактировать</a>
        </article>
    <?php endforeach; ?>
<?php } else { ?>
    <article>
        <p>Нет новостей</p>
    </article>
<?php } ?>
</body>
</html>