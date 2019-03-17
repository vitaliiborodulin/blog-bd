<?php


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

$messages = messages_all();

$inner = template('v_index', [
    'messages' => $messages,
    'msg' => $msg,
    'user' => $user,
    'isAuth' => $isAuth
]);
$title = 'Главная';


