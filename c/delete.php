<?php


if (!isAuth()) {
    header("Location:" . ROOT . "login");
    exit();
}

$id = $params[1] ?? null;
//$err404 = false;

if ($id === null || $id == '' || !ctype_digit($id)) {
    $err404 = true;
} else {
    messages_delete($id);

    header("Location:" . ROOT . "?msg=delOk");
    exit();
}


$inner = template('v_delete', [
    'err404' => $err404
]);

$title = 'Удалить сообщение';

