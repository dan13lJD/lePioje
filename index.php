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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>  
    <title>Le pioje</title>
</head>
<body id="body">
   
    <header class="header" id="header">
        <div class="contenedor" id="contenedor">
            <div class="barra" id="barra">
                <a class="logo" href="index.html" id="logo">
                    <img class="logo_imagen" src="/Imagenes/Logo.png" alt="">
                </a>
                <nav class="navegacion" id="navegacion"">
                    <a href="login.php" class="navegacion__enlace" id="iniciarsesion">Iniciar sesión</a>
                    <a href="registrarse.php" class="navegacion__enlace" id="registrarse" >Registrase</a>
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
<!-- <script type="text/javascript">
<?php 
    if($bandera==1){
        ?>
            window.onload=function eliminar(){
         load();
         test();
         agregar();
    }
        var b;
        function load(){
            b=document.getElementById("navegacion");
        }
        function test(){
            var hijo=document.getElementById("iniciarsesion"); 
            b.removeChild(hijo);
            var hijo2=document.getElementById("registrarse"); 
            b.removeChild(hijo2);
            var hijo3=document.getElementById("sobrenosotros"); 
            b.removeChild(hijo3);
        }
        function agregar(){
            console.log("ENTRO");
           var idelemento=document.getElementById("navegacion");
           var enlace=document.createElement("a");
           var enlace2=document.createElement("a");
           enlace2.textContent="SALIR";
           enlace.textContent="MENU";
           enlace.classList.add("navegacion__enlace");
           enlace2.classList.add("navegacion__enlace");
           enlace.href="menuDeUsuario.php";
           enlace2.href="includes/sesion.php";
           idelemento.appendChild(enlace);
           idelemento.appendChild(enlace2);
            
        }
<?php
    }
?> -->


</script>