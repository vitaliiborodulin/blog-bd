<?php


if (!isAuth()) {
    header('Location: index.php?c=login');
    exit();
}

$id = $_GET['id'] ?? null;
$err404 = false;

if (!check_id($id)) {
    $err404 = true;
} else {
    messages_delete($id);

    header('Location: index.php?msg=delOk');
    exit();
}


$inner = template('v_delete', [
    'err404' => $err404
]);

$title = 'Удалить сообщение';

