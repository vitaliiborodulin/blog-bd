<?php

if (!isAuth()) {
    header('Location: index.php?c=login');
    exit();
}

if (count($_POST) > 0) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title == '' || $content == '') {
        $msg = 'Поля не должны быть пустыми';
    } else {

        $id = messages_add($title, $content);
        header("Location: index.php?c=post&id=$id");
        exit();
    }

} else {
    $title = '';
    $content = '';
    $msg = '';
}

$inner = template('v_add', [
    'title' => $title,
    'content' => $content,
    'msg' => $msg
]);
$title = 'Новое сообщение';


