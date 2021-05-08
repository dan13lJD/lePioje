<?php
function conectarDB():mysqli{
    $db = new mysqli('localhost', 'root', '12345', 'lePioje');
    if(!$db){
        #echo "no se conecto";
        exit;
    }else{
        //echo "se conecto";
    }
    return $db;

}
conectarDB();