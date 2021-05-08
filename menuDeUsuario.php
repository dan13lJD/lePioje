<?php
session_start();
$nom = $_SESSION['NOMBRE'];
$id = $_SESSION['ID_USUARIO'];
if ($nom == null && $id == null) {
    header('Location: /index.php');
}
echo $nom . "<br>";
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
    <div id="contenido" class="seccion"></div>
    <!-- inicia el contenido del formulario para los productos-->
    <main id="seccion-producto" class="seccion">
        <h1 class="centrar-texto">Producto</h1>

        <div class="menu-header-nav">
            <nav class="menu-nav">
                <button type="button" id="1">Publicar un producto</button>
                <button type="button" id="2">Mis productos</button>
            </nav>
        </div>

        <!--Inicia el contenido del formulario para publicar un producto -->
        <div id="seccion-1" class="seccion">
            <h2 class="centrar-texto">Publicar un producto:</h2>
            <form class="registro-dividirFormulario" method="POST" action="" id="formulario-producto">
                <div class="registro-formulario">
                    <label for="n-producto">Nombre del producto:</label>
                    <input type="text" placeholder="Escribe el nombre del producto" id="n-producto" name="n-producto" class="required">

                    <label for="m-producto">Marca del producto:</label>
                    <input type="text" placeholder="Escribe la marca del producto" id="m-producto" name="m-producto" class="required">

                    <label for="c-producto">Color del producto:</label>
                    <input type="text" placeholder="Escribe el color del producto" id="c-producto" name="c-producto" class="required">

                    <label for="t-producto">Talla del producto:</label>
                    <select name="t-producto" id="t-producto">
                        <option value="CH">CH</option>
                        <option value="M">M</option>
                        <option value="G">G</option>
                        <option value="EG">EG</option>
                        <option value="CH">EEG</option>
                    </select>

                    <label for="tipo-producto">Este producto es para:</label>
                    <select name="tipo-producto" id="tipo-producto">
                        <option value="0">Donación</option>
                        <option value="1">Venta</option>
                    </select>

                    <label for="p-producto">Precio del producto:</label>
                    <input type="number" placeholder="Escribe el precio del producto (0 en caso de ser una donación)" id="p-producto" name="p-producto" min="0" max="100000" class="required">
                </div>
                <div class="registro-formulario">
                    <label for="persona-producto">Esta prenda es para:</label>
                    <select name="persona-producto" id="persona-producto">
                        <option value="Mujer">Mujer</option>
                        <option value="Hombre">Hombre</option>
                        <option value="Niño rata">Niña</option>
                        <option value="Niña">Niño</option>
                    </select>

                    <label for="cat-producto">Selecciona la categoria del producto</label>
                    <select name="cat-producto" id="cat-producto">
                        <option value="">Zapatillas</option>
                    </select>

                    <label for="material-producto">Ingresa el material del producto:</label>
                    <input type="text" name="material-producto" id="material-producto" class="required">

                    <label for="descripcion-producto">Ingresa una descripción del producto:</label>
                    <input type="textarea" name="descripcion-producto" id="descripcion-producto" class="required">

                    <label for="imagenes-producto">Sube algunas imágenes referentes al producto:</label>
                    <input type="file" name="imagenes-producto[]" id="imagenes-producto" accept="image/*" multiple class="required">

                    <button class="boton" id="subir-producto">Subir producto</button>
                </div>
            </form>
            
        </div>

        <div id="seccion-2" class="seccion">
            <h2 class="centrar-texto">Mis productos:</h2>
        </div>
    </main>

    <script src="JS/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
    <script src="JS/app.js"></script>    
</body>

</html>