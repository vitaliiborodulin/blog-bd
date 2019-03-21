<?php

//сбросили сессию
if (isset($_SESSION)) {
    unset($_SESSION['isAuth']);
}
//сбросили куки
if (isset($_COOKIE['login'])) {
    setcookie('login', '', 1, '/');
}

if (isset($_COOKIE['password'])) {
    setcookie('password', '', 1, '/');
}

if (count($_POST) > 0) {

    if ($_POST['user'] == 'admin' && $_POST['password'] == 'qwerty') {

        $_SESSION['isAuth'] = true;

        //Ставим куки, если человек нажал галочку запомнить
        if (isset($_POST['remember'])) {
            setcookie('login', hash('sha256', 'login'), time() + 3600 * 7 * 24, '/');
            setcookie('password', hash('sha256', 'qwerty'), time() + 3600 * 7 * 24, '/');
        }

        header('Location:' . ROOT);

    } else {
        $msg = 'Неверный логин или пароль';
    }

} else {
    $msg = 'Введите логин и пароль';
}

$inner = template('v_login', [
    'msg' => $msg
]);

$title = 'Войти на сайт';

