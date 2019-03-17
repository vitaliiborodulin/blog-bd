<?php

include_once('db.php');

function messages_all()
{
    $query = db_query("SELECT * FROM news ORDER BY dt DESC");
    return $query->fetchAll();
}

function messages_one($id)
{
    $query = db_query("SELECT * FROM news WHERE id_news=:id", ['id' => $id]);
    return $query->fetch();
}

function messages_add($title, $content)
{
    db_query("INSERT INTO news (title, content) VALUES (:title,:content)", [
        'title' => $title,
        'content' => $content
    ]);
    $db = db_connect();
    return $db->lastInsertId();
}

function messages_update($title, $content, $id)
{
    db_query("UPDATE news SET title=:title, content=:content WHERE id_news=:id", [
        'title' => $title,
        'content' => $content,
        'id' => $id
    ]);
    $db = db_connect();
    return $db->lastInsertId();
}

//непонятки
function messages_delete($id)
{
    $query = db_query("DELETE FROM news WHERE id_news=:id", ['id' => $id]);
    return $query;
}