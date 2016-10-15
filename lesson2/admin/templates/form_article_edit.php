<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Редактирование</title>
    <link rel="stylesheet" type="text/css" href="/lesson2/css/style.css">
</head>
<body>
<article>
    <table>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $data->id; ?>"
        <tr>
            <td>Заголовок</td>
            <td><input type="text" name="title" value="<?php echo $data->title; ?>"></td>
        </tr>
        <tr>
            <td>Текст новости</td>
            <td><textarea name="lead"><?php echo $data->lead; ?></textarea></td>
        </tr>
        <tr>
            <td>Автор</td>
            <td><input type="text" name="author" value="<?php echo $data->author; ?>"></td>
        </tr>
        <tr>
            <td colspan="2" align="right"><input type="submit" name="query" value="Записать"></td>
        </tr>
        </form>
    </table>
</article>
</body>
</html>