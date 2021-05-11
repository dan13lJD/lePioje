<?php
require 'app.php';
session_start();
$nom = $_SESSION['NOMBRE'];
$idUsuario = $_SESSION['ID_USUARIO'];

if ($nom == null && $id == null) {
        //no funciona?
        header('Location: /index.php');
}
$db = conectarDB(); //creamos la conexión con la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

#filtrado de datos
$id = mysqli_real_escape_string($db, $_POST['ID']);
$nProducto = mysqli_real_escape_string($db, $_POST['nproducto']); //nombre
$mProducto = mysqli_real_escape_string($db, $_POST['mproducto']); //marca
$cProducto = mysqli_real_escape_string($db, $_POST['cproducto']); //color
$tProducto = mysqli_real_escape_string($db, $_POST['tproducto']); //talla
$tipoProducto = mysqli_real_escape_string($db, $_POST['tipoProducto']); //tipo (donacion o venta)
$pProducto = mysqli_real_escape_string($db, $_POST['pproducto']); //precio
$personaProducto = mysqli_real_escape_string($db, $_POST['personaProducto']); //quien va a usar la prenda
$matProducto = mysqli_real_escape_string($db, $_POST['materialProducto']); //material
$descProducto = mysqli_real_escape_string($db, $_POST['descripcionProducto']);
$catProducto = mysqli_real_escape_string($db, $_POST['catProducto']); //categoria del producto (zapatos, vestidos, etc)
#preparamos la consulta
$query = "UPDATE PRODUCTO SET NOMBRE = '{$nProducto}', 
                              MARCA = '{$mProducto}', 
                              COLOR = '{$cProducto}', 
                              TALLA = '{$tProducto}', 
                              PRECIO = '{$pProducto}', 
                              DESCRIPCION = '{$descProducto}', 
                              TIPO_PERSONA = '{$personaProducto}', 
                              CATEGORIA = '{$catProducto}', 
                              MATERIAL = '{$matProducto}', 
                              TIPO = '{$tipoProducto}'
          WHERE ID_PRODUCTO = {$id}";
var_dump($query);
$resultadoActualizacion = mysqli_query($db, $query);
if($resultadoActualizacion){
        header('Location: ../menuDeUsuario.php');        
}
}