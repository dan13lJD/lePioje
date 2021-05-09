<?php
   session_start();
$nom=$_SESSION['NOMBRE'];
$id=$_SESSION['ID_USUARIO'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'app.php';
    $db = conectarDB();
    #filtrado de los datos
    $correo = mysqli_real_escape_string($db, filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL));
    $nombre = mysqli_real_escape_string($db, $_POST['name']);
    $apMaterno = mysqli_real_escape_string($db, $_POST['apMaterno']);
    $apPaterno = mysqli_real_escape_string($db, $_POST['apPaterno']);
    $telefono  = mysqli_real_escape_string($db, $_POST['telefono']);
    $estado = mysqli_real_escape_string($db, $_POST['estado']);
    $colonia = mysqli_real_escape_string($db, $_POST['colonia']);
    $calle = mysqli_real_escape_string($db, $_POST['calle']);
    $numero = mysqli_real_escape_string($db, $_POST['numero']);
    $cp = mysqli_real_escape_string($db, $_POST['cp']);
    $referencias = mysqli_real_escape_string($db, $_POST['referencias']);
    $ciudad = mysqli_real_escape_string($db, $_POST['ciudad']);
    $pais = mysqli_real_escape_string($db, $_POST['pais']);
    $query= "UPDATE USUARIOS SET NOMBRE='{$nombre}', CORREO='{$correo}', APELLIDO_P='{$apPaterno}',
    APELLIDO_M='{$apMaterno}', TELEFONO='{$telefono}', ESTADO= '{$estado}', COLONIA='{$colonia}',
    CALLE='{$calle}', NUMERO='{$numero}', CP='{$cp}', REFERENCIAS='{$referencias}', CIUDAD='{$ciudad}',
    PAIS='{$pais}' WHERE ID_USUARIO='{$id}'";
    $resultado= mysqli_query($db, $query);
    if($resultado){
        header('Location: /menuDeUsuario.php');
    }else{
        echo "no se modifico";
    }

}
?>