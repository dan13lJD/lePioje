<?php 

session_start();
$nom = $_SESSION['NOMBRE'];
$idUsuario = $_SESSION['ID_USUARIO'];


if ($nom == null && $id == null) {
    //no funciona?
    header('Location: /index.php');
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
    <link rel="stylesheet" href="Css/estilos.css">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>  
    <title>Le pioje</title>
</head>
<body id="body">
    <h1 class="bienvenido bienvenido-texto">Bienvenido <?php echo $nom?></h1>
    <header class="header" id="header">
        <div class="contenedor" id="contenedor">
            <div class="barra" id="barra">
                <a class="logo" href="index.html" id="logo">
                    <img class="logo_imagen" src="/Imagenes/Logo.png" alt="">
                </a>
                <nav class="navegacion" id="navegacion"">
                    <a href="menuDeUsuario.php" class="navegacion__enlace" id="iniciarsesion">Menu</a>
                    <a href="index.php" class="navegacion__enlace" id="registrarse" >Cerrar sesion</a>
                    <a href="nosotros.php" class="navegacion__enlace" id="sobrenosotros"> Sobre nosotros</a>
                    
                </nav>
            </div>

        </div>
        <div class="header__texto">
            <h2 class="no-margin header__texto__h2">La mejor de ropa de segunda mano</h2>
            <p class="no-margin header__texto__p">Todo a tu alcace</p>
        </div>
    </header>
    <div class="contenedor">
        <main class="principal">
            <div>
                <h1>MUJER</h1>
                <img src="/Imagenes/ModeloMujer.webp" alt="">
                <a class="boton" type="button" value="ROPA DE COMPRA" href="mostrarProductoMujer.php?IDP=1&type=1">ROPA DE COMPRA</a>
                <a class="boton" type="button" value="ROPA DE COMPRA" href="mostrarProductoMujer.php?IDP=0&type=1">ROPA DE DONACION</a>
                
                
            </div>
            <div>
                <h1>HOMBRE</h1>
                <img src="/Imagenes/ModeloHombre.jpg" alt="">
                <a class="boton" type="button" value="ROPA DE COMPRA" href="mostrarProducto.php?IDP=1&type=1">ROPA DE COMPRA</a>
                <a class="boton" type="button" value="ROPA DE COMPRA" href="mostrarProducto.php?IDP=0&type=1">ROPA DE DONACION</a>
            </div>
            <div>
                <h1>NIÑOS</h1>
                <img class="ImagenNino" src="/Imagenes/ModeloNino.jpg" alt="">
                <a class="boton" type="button" value="ROPA DE COMPRA" href="mostrarProducto.php?IDP=1&type=0">ROPA DE COMPRA</a>
                <a class="boton" type="button" value="ROPA DE COMPRA" href="mostrarProducto.php?IDP=0&type=0">ROPA DE DONACION</a>
            </div>
            <div>
                <h1>NIÑAS</h1>
                <img class="ImagenNino" src="/Imagenes/nina.jpeg" alt="">
                <a class="boton" type="button" value="ROPA DE COMPRA" href="mostrarProductoMujer.php?IDP=1&type=0">ROPA DE COMPRA</a>
                <a class="boton" type="button" value="ROPA DE COMPRA" href="mostrarProductoMujer.php?IDP=0&type=0">ROPA DE DONACION</a>
            </div>
    
    
        </main> 

    </div>
    <footer class="footer">
        <div class="footer-texto">
            <p>La mejor ropa de segunda mano en el mercado</p>
        </div>

    </footer>
</body>
</html>