<?php

function isAuth()
{
    $isAuth = false;

    if (isset($_SESSION['isAuth']) && $_SESSION['isAuth']) {
        $isAuth = true;
    } elseif (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
        if ($_COOKIE['login'] == 'admin' && $_COOKIE['password'] == hash('sha256', 'qwerty')) {
            $_SESSION['isAuth'] = true;
            $isAuth = true;
        }
    }

    return $isAuth;
}