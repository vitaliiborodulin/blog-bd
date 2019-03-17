<?php

$id = $_GET['id'] ?? null;
$err404 = false;

if (!check_id($id)) {
    $err404 = true;
} else {
    $message = messages_one($id);

    if ($message === false) {
        $err404 = true;
    }
//    echo nl2br($message['content']);
}

$inner = template('v_post', [
    'err404' => $err404,
    'message' => $message ?? null

]);

$title = 'Просмотр сообщения';


