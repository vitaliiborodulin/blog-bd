<?php

if (!isAuth()) {
    header("Location:" . ROOT . "login");
    exit();
}

if (count($_POST) > 0) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title == '' || $content == '') {
        $msg = 'Поля не должны быть пустыми';
    } else {

        $id = messages_add($title, $content);
        header("Location:" . ROOT. "post/$id");
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


