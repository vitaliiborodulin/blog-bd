<?php

define('ROOT', '/');

include_once('m/messages.php');
include_once('m/system.php');
include_once('m/auth.php');


$params = explode('/', $_GET['chpu']);
//последний элемент, если слэш, то удаляем
$end = count($params) - 1;

if($params[$end] === '') {
    unset($params[$end]);
    $end--;//?
}

//var_dump($params);

session_start();

$title = '';
$inner = '';
$err404 = false;

$controller = trim($params[0] ?? 'home');
if ($controller === '' || !file_exists("c/$controller.php") || !preg_match("/^[a-zA-Z0-9_]+$/", $controller)){
    $err404 = true;
} else {
    include_once "c/$controller.php";
}

if ($err404) {
//    header("HTTP/1.1 404 Not Found");
    $title = 'Страница не найдена 404';
    $inner = template('v_404');
}

echo template('v_main', [
    'title' => $title,
    'content' => $inner
]);

