<?php
require 'includes/app.php';

$db = conectarDB();
$errores = [];
$correo = '';
$contrasenia = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $correo = mysqli_real_escape_string($db, filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL));
    $contrasenia = mysqli_real_escape_string($db, $_POST['contrasenia']);
    $query = "SELECT * FROM USUARIOS WHERE CORREO = '{$correo}'";
    $resultado=mysqli_query($db, $query);
    if ($resultado){
        if(mysqli_num_rows($resultado)>0){
            while($fila=mysqli_fetch_array($resultado)){
                if( password_verify( $contrasenia, $fila["CONTRASENIA"]) and $fila["CORREO"==$correo]){
                    echo "todo correcto";
                    session_start();
                    $_SESSION['NOMBRE']=$fila["NOMBRE"];
                    $_SESSION['ID_USUARIO']=$fila["ID_USUARIO"];
                    header('Location: /menuDeUsuario.php');
                    die();
                    


                    
                }
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/Normalice.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Css/estiloLogin.css">
    <title>Iniciar sesión</title>
</head>

<body>
    <div class="contenedor-login">

        <div class="imagen">
        </div>

        <div class="login">

            <header class="centrar-img">
                <img class="logo" src="Imagenes/logoNegro.png" alt="logo">
            </header>

            <h3 class="centrar">Iniciar Sesión</h3>

            <form action="" class="formulario" method="POST">

                <label for="email">E-mail</label>
                <input type="email" placeholder="Ingresa tu email" id="email" name="correo">

                <label for="contraseña">Contraseña</label>
                <input type="password" placeholder="Tu contraseña" id="contraseña" name="contrasenia">

                <div class="separador">
                    <input class="boton" type="submit" value="Iniciar Sesión">
                </div>


                <a href="registrarse.html" class="contraseña-olvidada" href="#">¿Olvidaste tu contraseña?</a>



            </form>
        </div>



    </div>
    <footer class="footer">
        <div class="footer-texto">
            <p>La mejor ropa de segunda mano en el mercado</p>
        </div>

    </footer>

</body>

</html>