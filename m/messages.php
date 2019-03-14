<?php

function messagesAll(){
    $query = db_query("SELECT * FROM news ORDER BY dt DESC");
    return $query->fetchAll();
}