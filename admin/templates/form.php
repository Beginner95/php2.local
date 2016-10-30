<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Редактирование</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
<article>
    <table>
        <form method="post" action="/admin/save/?id=<?php echo $this->article->id; ?>">
        <tr>
            <td>Заголовок</td>
            <td><input type="text" name="title" value="<?php echo $article->title; ?>"></td>
        </tr>
        <tr>
            <td>Текст новости</td>
            <td><textarea name="lead"><?php echo $article->lead; ?></textarea></td>
        </tr>
        <tr>
            <td>Автор</td>
            <td><input type="text" name="author_id" value="<?php echo $article->author_id; ?>"></td>
        </tr>
        <tr>
            <td colspan="2" align="right"><input type="submit" name="query" value="Записать"></td>
        </tr>
        </form>
    </table>
</article>
</body>
</html>