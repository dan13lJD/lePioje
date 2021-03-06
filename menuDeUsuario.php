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
    <h1 class="bienvenido bienvenido-texto">Menu de <?php echo $nom?></h1>
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
    <!-- inicia el contenido del formulario para los productos ¡NO BORRAR, NO INTERFIERE CON TUS SECCIONES! 😒-->
    <main id="seccion-producto" class="seccion">
        <h1 class="centrar-texto">PRODUCTO</h1>

        <div class="menu-header-nav">
            <nav class="menu-nav">
                <button type="button" id="1">Publicar un producto</button>
                <button type="button" id="2">Mis productos</button>
            </nav>
        </div>
        
        <!--Inicia el contenido del formulario para publicar un producto ¡NO BORRAR, NO INTERFIERE CON TUS SECCIONES! 😒-->
        <div id="seccion-1" class="seccion">
            <h2 class="centrar-texto">PUBLICAR PRODUCTO</h2>
            

            <form class="registro-dividirFormulario" method="POST" action="/includes/publicarProducto.php" id="formulario-producto" enctype="multipart/form-data">
                <div class="registro-formulario">

                    <label for="nproducto">Nombre del producto:</label>
                    <input type="text" placeholder="Escribe el nombre del producto" id="nproducto" name="nproducto" class="required">

                    <label for="mproducto">Marca del producto:</label>
                    <input type="text" placeholder="Escribe la marca del producto" id="mproducto" name="mproducto" class="required">

                    <label for="cproducto">Color del producto:</label>
                    <input type="text" placeholder="Escribe el color del producto" id="cproducto" name="cproducto" class="required">

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
                    <input type="number" placeholder="Escribe el precio del producto (0 en caso de ser una donación)" id="pproducto" name="pproducto" min="0" max="100000" class="required">
                </div>
                <div class="registro-formulario">
                    <label for="personaProducto">Esta prenda es para:</label>
                    <select name="personaProducto" id="personaProducto">
                        <option value="Mujer">Mujer</option>
                        <option value="Hombre">Hombre</option>
                        <option value="Nino">Niño</option>
                        <option value="Nina">Niña</option>
                    </select>

                    <label for="catProducto">Selecciona la categoria del producto</label>
                    <select name="catProducto" id="catProducto">
                        <option value="Zapatillas">Zapatos</option>
                        <option value="Camisas">Camisas</option>
                        <option value="Pantalones">Pantalones</option>
                        <option value="Chamarras">Chamarras</option>
                        <option value="Tenis">Tenis</option>
                        <option value="sudaderas">Sudaderas</option>
                        <option value="sueteres">Suéteres</option>
                        <option value="accesorios">Accesorios</option>
                        <option value="pants">Pants</option>
                        <option value="shorts">Shorts</option>
                        <option value="falda">Falda</option>
                        <option value="vestido">Vestido</option>
                    </select>

                    <label for="materialProducto">Ingresa el material del producto:</label>
                    <input type="text" name="materialProducto" id="materialProducto" class="required">

                    <label for="descripcionProducto">Ingresa una descripción del producto:</label>
                    <input type="textarea" name="descripcionProducto" id="descripcionProducto" class="required">

                    <label for="imagenes-producto">Sube algunas imágenes referentes al producto:</label>
                    <input type="file" name="imagenes-producto[]" id="imagenes-producto[]" accept="image/*" multiple="" class="required">
                    
                    <button class="boton" id="subir-producto">Subir producto</button>
                    
                </div>
            </form>

        </div>

        <div id="seccion-2" class="seccion">

            <h2 class="centrar-texto">Mis productos:</h2>
            <?php $auxP = null; ?>
            <?php if (mysqli_num_rows($resultadoConsulta)>0) : ?>
                <?php while ($productos = mysqli_fetch_assoc($resultadoConsulta)) : ?>
                    <?php if ($auxP != $productos['ID_PRODUCTO']) : ?>
                        <div class="tarjeta-producto">
                            <img class="centrador" src="includes/usr/<?php echo $idUsuario ?>/<?php echo $productos['ID_PRODUCTO'] ?>/<?php echo $productos['NOMBRE_IMAGEN'] . $productos['NOMBRE_IMAGEN'] ?>" alt="img">

                            <p><span>ID:</span> <?php echo $productos['ID_PRODUCTO']; ?></p>
                            <p><span>Nombre producto:</span><?php echo $productos['NOMBRE']; ?></p>
                            <p><span>Descripción del Producto:</span> <?php echo $productos['DESCRIPCION']; ?></p>

                            <div class="alinear-botones-izquierda">
                                <a href="editar.php?id=<?php echo $productos['ID_PRODUCTO'] ?>" class="boton">Editar</a>
                                <a href="eliminar.php?id=<?php echo $productos['ID_PRODUCTO'] ?>" class="boton boton--eliminar">Eliminar</a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php $auxP = $productos['ID_PRODUCTO']; ?>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="tarjeta-producto">
                    <img src="iconos/caja-blanca-vacia.svg" alt="vacio">
                    <p class="centrar-texto"><span>Aún no tienes productos</span></p>
                </div>    
            <?php endif; ?>                
        </div>
    </main>
    <div class="contenedor">
                <img src="Imagenes/ropa3.jpeg"  class="mostrar-img" alt="">
                <div class="mostrar-img-texto">
                <h1>UNETE A ESTA CAUSA</h1>
                 </div>
            </div>
    <footer class="footer">
        <div class="footer-texto">
            <p>La mejor ropa de segunda mano en el mercado</p>
        </div>

    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="JS/app.js"></script>
    <script src="JS/scripts.js"></script>
</body>

</html>