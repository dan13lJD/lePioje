<?php
require 'includes/app.php';
session_start();
$nom = $_SESSION['NOMBRE'];
$idUsuario = $_SESSION['ID_USUARIO'];
if ($nom == null && $idUsuario == null) {
    //no funciona?
    header('Location: /index.php');
}

$db = conectarDB();
$ID = $_GET['ID'];

//preparamos la consulta
$query = "SELECT NOMBRE, MARCA, COLOR, TALLA, PRECIO,DESCRIPCION, TIPO_PERSONA, CATEGORIA, MATERIAL, TIPO FROM producto WHERE ID_PRODUCTO = {$ID}";
$resultado = mysqli_query($db, $query);
$producto = mysqli_fetch_assoc($resultado);
#inicializamos las variables
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
#consultamos las imagenes del producto
$query = "SELECT ID_IMAGEN, NOMBRE_IMAGEN, ID_USUARIO  FROM IMAGENES_PRODUCTO WHERE ID_PRODUCTO = {$ID}";
$resultadoConsultaImagenes = mysqli_query($db, $query);
#Consultamos los productos del carrito de compras
$query = "SELECT ID_USUARIO FROM CARRITO WHERE ID_USUARIO = {$idUsuario}";
$resultadoConsultaCarrito = mysqli_query($db, $query);
$itemsCarrito = mysqli_num_rows($resultadoConsultaCarrito);
#consultamos si el producto ya existe en el carrito, para ya sabes que
$query = "SELECT ID_USUARIO FROM CARRITO WHERE ID_PRODUCTO = {$ID} AND ID_USUARIO = {$idUsuario}";
$resultadoExistenciaCarrito = mysqli_query($db, $query);

?>
<!DOCTYPE html>
<html lang="es">

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

    <title><?php echo $nProducto;?> | Lé piojè</title>
</head>

<body>
    <header class="header-interno">

        <div class="centrador">
            <img class=" imagen invertir" src="/Imagenes/logoNegro.png" alt="">
        </div>

        <div class="centrar">
            <div class="sidebar-social">
                <ul>
                    <li>
                        <a href="mostrarProducto.php">
                            <i><img class="invertir" src="iconos/volver-flecha.svg" alt="">Volver</i>
                        </a>
                    </li>
                    <li>
                        <a href="menuDeUsuario.php">
                            <i><img class="invertir" src="iconos/usuario.svg" alt="">Perfil</i>
                        </a>
                    </li>
                    <li>
                        <a href="carrito.php" class="cart">
                            <i><img class="invertir" src="iconos/carrito.svg" alt="">Carrito</i>
                            <span id="cart_menu_num" data-action="cart-can" class="badge rounded-circle"><?php echo $itemsCarrito; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <div>
            <h1 class="centrar-texto"><?php echo $nProducto; ?></h1>
            <div class="contenedor-productos">
                <div class="">
                    <!-- imagenes -->
                    <h4 class="centrar-texto">Imágenes del producto</h4>

                    <ul class="galeria">
                        <?php while ($imagen = mysqli_fetch_assoc($resultadoConsultaImagenes)) : ?>
                            <li><a href="#img<?php echo $imagen['ID_IMAGEN']; ?>"><img src="/usr/<?php echo $imagen['ID_USUARIO'] ?>/<?php echo $ID ?>/<?php echo $imagen['NOMBRE_IMAGEN'] . $imagen['NOMBRE_IMAGEN'] ?>" alt="img"></a></li>
                            <div class="modal" id="img<?php echo $imagen['ID_IMAGEN']; ?>">
                                <div class="imagen">                                    
                                    <a href="#img<?php echo $imagen['ID_IMAGEN']; ?>"><img src="/usr/<?php echo $imagen['ID_USUARIO'] ?>/<?php echo $ID ?>/<?php echo $imagen['NOMBRE_IMAGEN'] . $imagen['NOMBRE_IMAGEN'] ?>"> </a>
                                </div>
                                <a class="cerrar" href="">X</a>
                            </div> 
                        <?php endwhile; ?>
                    </ul>

                </div>         
                <div class="informacion">
                    <!-- informacion del producto -->
                    <h4 class="centrar-texto"> <?php echo $nProducto; ?></h4>
                    <p>Marca: <span id="marca"><?php echo $mProducto; ?></span></p>
                    <p>Color: <span id="marca"><?php echo $cProducto; ?></span></p>
                    <p>Talla: <span id="talla"><?php echo $tProducto; ?></span></p>
                    <p>Precio: <span id="precio"><?php echo $pProducto; ?></span></p>
                    <p>Descripción: <span id="descripcion"><?php echo $descProducto; ?></span></p>
                    <?php  if(mysqli_num_rows($resultadoExistenciaCarrito)>0):?> 
                        <a href="includes/eliminarP.php?ID=<?php echo $ID; ?>"class="boton">Eliminar Producto del carrito</a>                                
                    <?php else:?>    
                        <a href="includes/agregarP.php?ID=<?php echo $ID; ?>"class="boton">Agregar al carrito</a>
                    <?php endif;?>  
                </div>
            </div>
    </main>
    <footer class="footer">
        <div class="footer-texto">
            <p>La mejor ropa de segunda mano en el mercado</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="JS/app.js"></script>
</body>

</html>