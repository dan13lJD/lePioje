<?php
function conectarDB():mysqli{
    $db = new mysqli('localhost', 'root', '12345', 'lePioje');
    if(!$db){
        echo "no se conecto";
        exit;
    }
    return $db;
}