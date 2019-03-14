<?php

function db_connect()
{
    static $db;//open connect only one time

    if ($db === null) {
        $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $db->exec('SET NAMES UTF8');
    }

    return $db;
}

function db_query($sql, $params = [])
{
    $db = db_connect();
    $query = $db->prepare($sql);
    $query->execute($params);

    db_check_error($query);
    return $query;
}

function db_check_error($query)
{
    $info = $query->errorInfo();

    if ($info[0] != PDO::ERR_NONE) {
        exit($info[2]);
    }
}

//function check_title($title)
//{
//    return preg_match("/[^a-zA-Za-яА-Я0-9-]/i", $title);
//}

function check_id($id)
{
    return preg_match("/^[0-9]+$/", $id);
}
