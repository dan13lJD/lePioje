<?php

require 'app.php';
session_start();
$nom = $_SESSION['NOMBRE'];
$idUsuario = $_SESSION['ID_USUARIO'];
if ($nom == null && $idUsuario == null) {
    //no funciona?
    header('Location: /index.php');
}

$db = conectarDB();
$ID = $_GET['ID'];

#preparamos la inserción en la base de datos:
$query = "INSERT INTO CARRITO (ID_PRODUCTO, ID_USUARIO) VALUES ({$ID}, {$idUsuario})";
$resultado = mysqli_query($db, $query);
if($resultado){    
    header('location: ../carrito.php');   
}