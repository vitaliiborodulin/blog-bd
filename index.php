<?php

include_once('m/messages.php');
include_once('m/system.php');
include_once('m/auth.php');
include_once('m/misc.php');

session_start();

//добавить проверки
$controller = $_GET['c'] ?? 'home';
include_once "c/$controller.php";

echo template('v_main', [
    'title' => $title,
    'content' => $inner
]);

