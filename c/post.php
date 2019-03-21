<?php

$id = $params[1] ?? null;
//$err404 = false;

if ($id === null || $id == '' || !ctype_digit($id)) {
    $err404 = true;
} else {
    $message = messages_one($id);

    if ($message === false) {
        $err404 = true;
    }
//    echo nl2br($message['content']);
}

if (!$err404) {

    $title = 'Просмотр сообщения';
    $inner = template('v_post', [
        'message' => $message ?? null
    ]);
}




