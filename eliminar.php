<?php

session_start();
$nom = $_SESSION['NOMBRE'];
$idUsuario = $_SESSION['ID_USUARIO'];

if ($nom == null && $id == null) {
        //no funciona?
        header('Location: /index.php');
}

require 'includes/app.php';

$db = conectarDB(); //creamos la conexión con la base de datos
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

$carpetaRaiz = "usr";
$carpetaUsuario = $idUsuario;
$carpetaProducto = $id;

if($id){
        $query = "SELECT NOMBRE_IMAGEN FROM IMAGENES_PRODUCTO WHERE ID_PRODUCTO = {$id}";
        $resultado = mysqli_query($db, $query);       
        
        #eliminacion de imagenes
        while ($productos = mysqli_fetch_assoc($resultado)){
                unlink($carpetaRaiz.'/'.$idUsuario.'/'.$id.'/'.$productos['NOMBRE_IMAGEN'].$productos['NOMBRE_IMAGEN']);                
        }
        rmdir($carpetaRaiz.'/'.$idUsuario.'/'.$id.'/');

        $query = "DELETE FROM IMAGENES_PRODUCTO  WHERE ID_PRODUCTO = {$id}";
        $resultadoEliminacion = mysqli_query($db, $query);

        if($resultadoEliminacion){
                $query= "DELETE FROM PRODUCTO WHERE ID_PRODUCTO = {$id}";
                $resultadoEliminacion = mysqli_query($db, $query);
                header('location: /menuDeUsuario.php');
        }
}



