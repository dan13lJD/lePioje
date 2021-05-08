<?php
        require 'includes/app.php';
        session_start();
        $nom = $_SESSION['NOMBRE'];
        $id = $_SESSION['ID_USUARIO'];
        if ($nom == null && $id == null) {
                header('Location: /index.php');
        }
        $db = conectarDB();
        $errores = [];
        #inicializamos las variables del formulario

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        #filtrado de datos
        $nProducto = mysqli_real_escape_string($db, $_POST['n-producto']);
        $mProducto = mysqli_real_escape_string($db, $_POST['m-producto']);
        $cProducto = mysqli_real_escape_string($db, $_POST['c-producto']);
        $tProducto = mysqli_real_escape_string($db, $_POST['t-producto']);
        $tipoProducto = mysqli_real_escape_string($db, $_POST['tipo-producto']);
        $pProducto = mysqli_real_escape_string($db, $_POST['p-producto']);
        $personaProducto = mysqli_real_escape_string($db, $_POST['persona-producto']);
        $matProducto = mysqli_real_escape_string($db, $_POST['material-producto']);
        $descProducto = mysqli_real_escape_string($db, $_POST['descripcion-producto']);
        // $imagenesProducto=$_POST['imagenes-producto'];

        #comprobar que los campos no esten vacios
        if (!$nProducto) {
                $errores[] = "Ingresa un nombre para el producto";
        }
        if (!$mProducto) {
                $errores[] = "Ingresa una marca para el producto";
        }
        if (!$cProducto) {
                $errores[] = "Ingresa un color para el producto";
        }
        if (!$pProducto) {
                $errores[] = "Ingresa un precio para el producto";
        }
        if (!$matProducto) {
                $errores[] = "Ingresa el material del producto";
        }
        if (!$nProducto) {
                $errores[] = "Ingresa una descripción para el producto";
        }
        // if(!$imagenesProducto){

        // }
        
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Publicar</title>
</head>

<body>
        <header class="contendor">
                <h2 class="centrar-texto">Publicar un producto</h2>
                <?php foreach ($errores as $error) : ?>
                        <div class="alerta error centrar-texto">
                                <?php
                                        echo $error;
                                ?>
                        </div>
                <?php endforeach; ?>
        </header>
        <main>
                <form class="registro-dividirFormulario" method="POST" action="publicar.php">
                        <div class="registro-formulario">
                                <label for="n-producto">Nombre del producto:</label>
                                <input type="text" placeholder="Escribe el nombre del producto" id="n-producto" name="n-producto">

                                <label for="m-producto">Marca del producto:</label>
                                <input type="text" placeholder="Escribe la marca del producto" id="m-producto" name="m-producto">

                                <label for="c-producto">Color del producto:</label>
                                <input type="text" placeholder="Escribe el color del producto" id="c-producto" name="c-producto">

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
                                <input type="number" placeholder="Escribe el precio del producto (0 en caso de ser una donación)" id="p-producto" name="p-producto" min="0" max="100000">
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
                                <input type="text" name="material-producto" id="material-producto">

                                <label for="descripcion-producto">Ingresa una descripción del producto:</label>
                                <input type="textarea" name="descripcion-producto" id="descripcion-producto">

                                <label for="imagenes-producto">Sube algunas imágenes referentes al producto:</label>
                                <input type="file" name="imagenes-producto[]" id="imagenes-producto" accept="image/*" multiple>
                                
                                <button class="boton" id="subir-producto">Subir producto</button>
                        </div>
                </form>
        </main>
</body>

</html>