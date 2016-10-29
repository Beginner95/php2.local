<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Новости</title>
    <link rel="stylesheet" type="text/css" href="/lesson4/css/style.css">
</head>
<body>
    <h1>Новости</h1>
    <?php if (!empty($news)) { ?>
        <?php foreach ($news as $article): ?>
                <article>
                    <a href="/lesson4/news/one/?id=<?= $article->id ?>"><?php echo $article->title; ?></a>
                    <p><?php echo $article->lead; ?></p>
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