<?php
session_start();
session_unset();
session_destroy();
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
   

    <title>Le pioje</title>
</head>
<body>
   
    <header class="header">
        <div class="contenedor">
            <div class="barra">
                <a class="logo" href="index.html">
                    <img class="logo_imagen" src="/Imagenes/Logo.png" alt="">
                </a>
                <nav class="navegacion">
                    <a href="login.php" class="navegacion__enlace">Iniciar sesión</a>
                    <a href="#" class="navegacion__enlace">Registrase</a>
                    <a href="#" class="navegacion__enlace">Sobre nosotros</a>
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
                <input class="boton" type="button" value="BUSCAR">

                
            </div>
            <div>
                <h1>HOMBRE</h1>
                <img src="/Imagenes/ModeloHombre.jpg" alt="">
                <input class="boton" type="button" value="BUSCAR">
            </div>
            <div>
                <h1>NIÑOS</h1>
                <img class="ImagenNino" src="/Imagenes/ModeloNino.jpg" alt="">
                <input class="boton" type="button" value="BUSCAR">
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