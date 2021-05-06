<?php
    session_start();
    $nom=$_SESSION['NOMBRE'];
    $id=$_SESSION['ID_USUARIO'];
    if ($nom==null && $id==null){
        header('Location: /index.php');

    }
    echo $nom."<br>";
    echo "<a href='index.php'>cerrar sesion</a>";
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
    <title>Configuracion</title>
</head>
<body>
    <header class="menu-headerprincipal">
        <div class="contenedor">
            <div class="barra">
                <a class="logo" href="index.html">
                    <img class="logo_imagen" src="/Imagenes/Logo.png" alt="">
                </a>
            </div>

        </div>
        <div class="header__texto">
            <h2 class="no-margin header__texto__h2">La mejor de ropa de segunda mano</h2>

        </div>
        <div class="menu-header-nav">
            <nav class="menu-nav">
                <button type="button" id="perfil">Perfil</button>
                <button type="button" id="producto">Producto</button>
                <button type="button" id="ventas">Ventas</button>
                <button type="button" id="historial">Historial</button>
                    
            </nav>
        </div>
    </header>
    <div  id="contenido"></div>

    <script src="JS/scripts.js"></script>
</body>

</html>