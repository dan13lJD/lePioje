<?php #guardar el pago en la base de datos, eliminar el producto tambien
session_start();
require 'includes/app.php';
$nom = $_SESSION['NOMBRE'];
$idUsuario = $_SESSION['ID_USUARIO'];

if ($nom == null && $idUsuario == null) {
        //no funciona?
        header('Location: /index.php');
}


$exito = (boolean)$_GET['exito'];
$paymentId = $_GET['paymentId'];

$totalRopa = 0;
$NombreProductos = [];


$queryCarrito = "SELECT ID_PRODUCTO FROM CARRITO WHERE ID_USUARIO = {$idUsuario}";
$resultadoConsultaProductos = mysqli_query($db, $queryCarrito);
if($exito){
        while ($productos = mysqli_fetch_assoc($resultadoConsultaProductos)){
                $queryProductos = "SELECT ID_PRODUCTO, NOMBRE, ID_USUARIO, PRECIO FROM PRODUCTO WHERE ID_PRODUCTO={$productos['ID_PRODUCTO']}";
                $resultadoConsultaP = mysqli_query($db, $queryProductos);
                
                while($p = mysqli_fetch_assoc($resultadoConsultaP)){                        
                        $queryVentas = "INSERT INTO VENTA (ID_VENTA, ID_COMPRADOR, ID_VENDEDOR, NOMBRE_PRODUCTO, PRECIO) VALUES ('{$paymentId}', {$idUsuario}, {$p['ID_USUARIO']}, '{$p['NOMBRE']}', {$p['PRECIO']})";                        
                        $resultadoInsercionV =  mysqli_query($db, $queryVentas);   
                        
                        $queryCompra = "INSERT INTO COMPRA (ID_VENTA, ID_COMPRADOR, ID_VENDEDOR, NOMBRE_PRODUCTO, PRECIO) VALUES ('{$paymentId}', {$idUsuario}, {$p['ID_USUARIO']}, '{$p['NOMBRE']}', {$p['PRECIO']})";                        
                        $resultadoInsercionC =  mysqli_query($db, $queryCompra);   
                }                
        }

        $queryEliminacion = "DELETE FROM CARRITO WHERE ID_USUARIO = {$idUsuario}";
        $resultadoEliminacion =  mysqli_query($db, $queryEliminacion);
        if($resultadoEliminacion){
                header("Location: /menuDeUsuario.php?code=true");
        }
}else{
        header("Location: /menuDeUsuario.php?code=false");
}
?>
