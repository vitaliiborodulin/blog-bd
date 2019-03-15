<?php

include_once('m/messages.php');
include_once('m/misc.php');


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


include 'v/v_post.php';


