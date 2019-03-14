<?php
session_start();
include_once('functions.php');

if (!isAuth()) {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'] ?? null;
$msg = '';
$err404 = false;


if (!check_id($id)) {
    $err404 = true;
}

if (count($_POST) > 0) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title == '' || $content == '') {
        $msg = 'Поля не должны быть пустыми';
    } else {

        db_query("UPDATE news SET title=:title, content=:content WHERE id_news=:id", [
            'title' => $title,
            'content' => $content,
            'id' => $id
        ]);

        header('Location: index.php?msg=editOk');
        exit();
    }

} else {
    $query = db_query("SELECT * FROM news WHERE id_news=:id", ['id' => $id]);
    $message = $query->fetch();

//    $msg = '';
    if ($message === false) {
        $err404 = true;
    }

}

?>
<?php if ($err404) { ?>
    404
<?php } else { ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактирование новости</title>
</head>
<body>
<form method="post">
    <p><label>
            Заголовок <br>
            <input type="text" name="title" value="<?php echo $message['title']; ?>">
        </label>
    </p>
    <p><label>
            Текст <br>
            <textarea name="content" cols="30" rows="10"><?php echo $message['content']; ?></textarea>
        </label>
    </p>
    <p>
        <input type="submit" value="Сохранить">
    </p>
</form>
<div class="message">
    <?php echo $msg; ?>
</div>
<?php } ?>
<hr>
<a href="index.php">На главную</a>
</body>
</html>