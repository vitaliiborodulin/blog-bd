<?php

session_start();

include_once('m/db.php');
include_once('m/auth.php');
include_once('m/messages.php');


$isAuth = isAuth();

if ($isAuth) {
    $user = 'Админ';
} else {
    $user = 'Аноним';
}

$msg = '';
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'addOk') {
        $msg = 'Статья успешно добавлена!';
    } elseif ($_GET['msg'] == 'editOk') {
        $msg = 'Статья успешно отредактирована!';
    } elseif ($_GET['msg'] == 'delOk') {
        $msg = 'Статья успешно удалена!';
    } elseif ($_GET['msg'] == 'noAuth') {
        $msg = 'Зарегистрируйтесь для добавления/изменения статьи!';
    }
}

$messages = messagesAll();

include 'v/v_index.php';


