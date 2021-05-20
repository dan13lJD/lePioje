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
#preparamos la eliminación
$query = "DELETE FROM carrito WHERE ID_PRODUCTO = {$ID}";
$resultado = mysqli_query($db, $query);

if($resultado){
    //se redirige a la página de inicio
    header('location: ../carrito.php'); 
}