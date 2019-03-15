<?php

//function check_title($title)
//{
//    return preg_match("/[^a-zA-Za-яА-Я0-9-]/i", $title);
//}

function check_id($id)
{
    return preg_match("/^[0-9]+$/", $id);
}
