<?php
require 'app.php';
session_start();
$nom = $_SESSION['NOMBRE'];
$idUsuario = $_SESSION['ID_USUARIO'];

if ($nom == null && $id == null) {
    //no funciona?
    header('Location: /index.php');
}
$db = conectarDB(); //creamos la conexión con la base de datos 
#preparamos la consulta para revisar los articulos del usuario
$query = "SELECT PRODUCTO.ID_PRODUCTO, 
                 IMAGENES_PRODUCTO.ID_USUARIO, 
                 PRODUCTO.NOMBRE, 
                 PRODUCTO.DESCRIPCION,
                 IMAGENES_PRODUCTO.NOMBRE_IMAGEN 
          FROM PRODUCTO 
          INNER JOIN IMAGENES_PRODUCTO 
          ON PRODUCTO.ID_PRODUCTO = IMAGENES_PRODUCTO.ID_PRODUCTO 
          WHERE IMAGENES_PRODUCTO.ID_USUARIO IN({$idUsuario});";

$resultadoConsulta = mysqli_query($db, $query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    #filtrado de datos
    $nProducto = mysqli_real_escape_string($db, $_POST['nproducto']); //nombre
    $mProducto = mysqli_real_escape_string($db, $_POST['mproducto']); //marca
    $cProducto = mysqli_real_escape_string($db, $_POST['cproducto']); //color
    $tProducto = mysqli_real_escape_string($db, $_POST['tproducto']); //talla
    $tipoProducto = mysqli_real_escape_string($db, $_POST['tipoProducto']); //tipo (donacion o venta)
    $pProducto = mysqli_real_escape_string($db, $_POST['pproducto']); //precio
    $personaProducto = mysqli_real_escape_string($db, $_POST['personaProducto']); //quien va a usar la prenda
    $matProducto = mysqli_real_escape_string($db, $_POST['materialProducto']); //material
    $descProducto = mysqli_real_escape_string($db, $_POST['descripcionProducto']);
    $catProducto = mysqli_real_escape_string($db, $_POST['catProducto']); //categoria del producto (zapatos, vestidos, etc)
    #preparamos la consulta
    $query = "INSERT INTO producto (NOMBRE, MARCA, COLOR, TALLA, PRECIO, DESCRIPCION, TIPO_PERSONA, CATEGORIA, MATERIAL, TIPO, ID_USUARIO)
              VALUES ('{$nProducto}',
                      '{$mProducto}',
                      '{$cProducto}',
                      '{$tProducto}',
                      '{$pProducto}',
                      '{$descProducto}',
                      '{$personaProducto}',
                      '{$catProducto}',
                      '{$matProducto}',
                      '{$tipoProducto}',
                       {$idUsuario}
                      )";
    #insertamos en la base de datos los datos correspondientes
    $resultado = mysqli_query($db, $query);

    #leemos el dato del ID en la base de datos 
    $query = "SELECT ID_PRODUCTO FROM producto WHERE NOMBRE = '{$nProducto}'";
    var_dump($query);
    $resultado = mysqli_query($db, $query);
    $idProducto = mysqli_fetch_assoc($resultado);
    $id = $idProducto['ID_PRODUCTO'];

    #subida de archivos al servidor
    $carpeta_raiz = "usr";
    $carpeta_usuario = $idUsuario;
    $carpetaProducto = $id;

    $nombre_imagen = '';

    foreach ($_FILES["imagenes-producto"]['tmp_name'] as $key => $tmp_name) {

        if ($_FILES["imagenes-producto"]["name"][$key]) {
            #leemos la fuente de las imágenes            
            $fuente = $_FILES["imagenes-producto"]["tmp_name"][$key];
            #definimos el path donde se guardarán las imágenes
            $carpeta = "$carpeta_raiz/$carpeta_usuario/$carpetaProducto";

            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
            }
            #generamos un nombre unico para las imagenes 
            $nombre_imagen = md5(uniqid(rand(), true)) . ".jpg";

            $dir = opendir($carpeta);
            $target_path = $carpeta . '/' . $nombre_imagen;
            $query = "INSERT INTO imagenes_producto(ID_PRODUCTO, ID_USUARIO, NOMBRE_IMAGEN) VALUES ($id, $idUsuario, '{$nombre_imagen}')";
            if (move_uploaded_file($fuente, $target_path . $nombre_imagen)) {
                #ya solo se debe cargar la referencia del nombre en la base de datos
                $resultado = mysqli_query($db, $query);
                if ($resultado) {
                        header('Location: /menuDeUsuario.php?codeP=true');
                }
            } else {
                header('Location: /menuDeUsuario.php?codeP=false');
            }
        }
    }
}