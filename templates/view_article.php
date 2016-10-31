<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Новость</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
    <article>
            <h2><?php echo $article->title; ?></h2>
            <p><?php echo $article->lead; ?></p>

            <?php if (!empty($article->author)) : ?>
                <div class="author">Автор: <?php echo $article->author->name; ?></div>
            <?php endif; ?>
    </article>
</body>
</html>