<?php

include_once('db.php');

function messages_all(){
    $query = db_query("SELECT * FROM news ORDER BY dt DESC");
    return $query->fetchAll();
}

function messages_one($id){
    $query = db_query("SELECT * FROM news WHERE id_news=:id", ['id' => $id]);
    return $query->fetch();
}