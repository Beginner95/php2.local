<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Новости</title>
    <link rel="stylesheet" type="text/css" href="/lesson2/css/style.css">
</head>
<body>
    <h1>Новости</h1>
    <?php if (!empty($news)) { ?>
        <?php foreach ($news as $article): ?>
                <article>
                    <a href="/lesson3/article.php?id=<?= $article->id ?>"><?php echo $article->title; ?></a>
                    <p><?php echo substr($article->lead, 0, 200); ?></p>
                    <?php if (!empty($article->author)) : ?>
                        <p class="author">Автор: <?php echo $article->author->name; ?></p>
                    <?php endif; ?>
                </article>
        <?php endforeach; ?>
    <?php } else { ?>
        <article>
            <p>Новостей нет</p>
        </article>
    <?php } ?>
</body>
</html>