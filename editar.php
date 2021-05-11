<?php
require 'includes/app.php';
session_start();
$nom = $_SESSION['NOMBRE'];
$idUsuario = $_SESSION['ID_USUARIO'];

if ($nom == null && $id == null) {
        //no funciona?
        header('Location: /index.php');
}
$db = conectarDB(); //creamos la conexión con la base de datos
//filtramos las variables
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
//consultamos los datos 
$query = "SELECT * FROM PRODUCTO WHERE ID_PRODUCTO = {$id}";
$resultado = mysqli_query($db, $query);
$producto = mysqli_fetch_assoc($resultado);
#iniciamos las variable
$nProducto = $producto['NOMBRE'];
$mProducto = $producto['MARCA'];
$cProducto = $producto['COLOR'];
$tProducto = $producto['TALLA'];
$tipoProducto = $producto['TIPO'];
$pProducto = $producto['PRECIO'];
$personaProducto = $producto['TIPO_PERSONA'];
$matProducto = $producto['MATERIAL'];
$descProducto = $producto['DESCRIPCION'];
$catProducto = $producto['CATEGORIA'];



// $carpetaRaiz = "usr";
// $carpetaUsuario = $idUsuario;
// $carpetaProducto = $id;


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
        <title>Editar producto</title>
</head>

<body>

        <header class="menu-headerprincipal">
                <div class="contenedor">
                        <div class="barra">
                                <img class="logo_imagen invertir" src="/Imagenes/logoNegro.png" alt="">
                        </div>
                </div>
                <div class="header__texto">
                        <h2 class="no-margin header__texto__h2">Editar Producto</h2>
                </div>
        </header>
        <main>
                <div>

                        <form class="registro-dividirFormulario" method="POST" id="formulario-producto" enctype="multipart/form-data" action="includes/modProducto.php">
                                <div class="registro-formulario">

                                        <label for="nproducto">Nombre del producto:</label>
                                        <input type="text" placeholder="Escribe el nombre del producto" id="nproducto" name="nproducto" class="required" value="<?php echo $nProducto?>">

                                        <label for="mproducto">Marca del producto:</label>
                                        <input type="text" placeholder="Escribe la marca del producto" id="mproducto" name="mproducto" class="required" value="<?php echo $mProducto?>">

                                        <label for="cproducto">Color del producto:</label>
                                        <input type="text" placeholder="Escribe el color del producto" id="cproducto" name="cproducto" class="required" value="<?php echo $cProducto?>">

                                        <label for="tproducto">Talla del producto:</label>
                                        <select name="tproducto" id="tproducto">
                                                <option value="CH">CH</option>
                                                <option value="M">M</option>
                                                <option value="G">G</option>
                                                <option value="EG">EG</option>
                                                <option value="CH">EEG</option>
                                        </select>

                                        <label for="tipoProducto">Este producto es para:</label>
                                        <select name="tipoProducto" id="tipoProducto">
                                                <option value="0">Donación</option>
                                                <option value="1">Venta</option>
                                        </select>

                                        <label for="pproducto">Precio del producto:</label>
                                        <input type="number" placeholder="Escribe el precio del producto (0 en caso de ser una donación)" id="pproducto" name="pproducto" min="0" max="1000" class="required" value="<?php echo $pProducto?>">
                                </div>
                                <div class="registro-formulario">
                                        <label for="personaProducto">Esta prenda es para:</label>
                                        <select name="personaProducto" id="personaProducto">
                                                <option value="Mujer">Mujer</option>
                                                <option value="Hombre">Hombre</option>
                                                <option value="Niño rata">Niña</option>
                                                <option value="Niña">Niño</option>
                                        </select>

                                        <label for="catProducto">Selecciona la categoria del producto</label>
                                        <select name="catProducto" id="catProducto">
                                                <option value="Zapatillas">Zapatillas</option>
                                        </select>

                                        <label for="materialProducto">Ingresa el material del producto:</label>
                                        <input type="text" name="materialProducto" id="materialProducto" class="required" value="<?php echo $matProducto?>">

                                        <label for="descripcionProducto">Ingresa una descripción del producto:</label>
                                        <input type="textarea" name="descripcionProducto" id="descripcionProducto" class="required" value="<?php echo $descProducto?>">
                                        <input type="hidden" name="ID" value="<?php echo $id?>">

                                        <button class="boton" id="subir-producto">Subir producto</button>
                                </div>
                        </form>
        </main>

</body>
<script src="JS/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="JS/app.js"></script>
</html>