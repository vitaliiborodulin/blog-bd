<?php

if (!isAuth()) {
    header("Location:" . ROOT . "login");
    exit();
}

$id = $params[1] ?? null;
$msg = '';
//$err404 = false;


if ($id === null || $id == '' || !ctype_digit($id)) {
    $err404 = true;
}

if (count($_POST) > 0) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title == '' || $content == '') {
        $msg = 'Поля не должны быть пустыми';
    } else {

        $message = messages_update($title, $content, $id);
        header("Location:" . ROOT . "?msg=editOk");
        exit();
    }

} else {
    $message = messages_one($id);

//    $msg = '';
    if ($message === false) {
        $err404 = true;
    }

}

$inner = template('v_edit', [
    'err404' => $err404,
    'message' => $message,
    'msg' => $msg
]);

$title = 'Редактировать сообщение';
