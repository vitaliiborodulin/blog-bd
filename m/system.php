<?php

function template($filename, $vars = []){

    extract($vars);

    ob_start();
    include "v/$filename.php";
    return ob_get_clean();
}