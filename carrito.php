<?php
#este archivo muestra los productos del carrito del cliente
#autor: daniel jimenez diaz
require 'includes/app.php';
session_start();
$nom = $_SESSION['NOMBRE'];
$idUsuario = $_SESSION['ID_USUARIO'];
if ($nom == null && $idUsuario == null) {
        //no funciona?
        header('Location: /index.php');
}

#Consultamos los productos del carrito de compras
$query = "SELECT ID_PRODUCTO FROM CARRITO WHERE ID_USUARIO = {$idUsuario}";
$resultadoConsultaProductos = mysqli_query($db, $query);

$total = 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carrito de compras | Lé piojè</title>
        <link rel="stylesheet" href="Css/Normalice.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@200&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="Css/estilos.css">
</head>

<body>
        <header class="header-interno">
                <div class="centrador">
                        <img class=" imagen invertir" src="/Imagenes/logoNegro.png" alt="">
                </div>
        </header>

        <main>
                <h1 class="centrar-texto">Carrito de compras</h1>

                
                        <table class="productos">
                                <thead>
                                        <tr>
                                                <th>Nombre Producto</th>
                                                <th>Marca</th>
                                                <th>Talla</th>
                                                <th>Precio</th>
                                                <!-- <th>Eliminar</th> -->
                                        </tr>
                                </thead>

                                <tbody>
                                        <?php while ($productos = mysqli_fetch_assoc($resultadoConsultaProductos)) : ?>
                                                <?php $query = "SELECT ID_PRODUCTO, NOMBRE, MARCA, TALLA, PRECIO FROM PRODUCTO WHERE ID_PRODUCTO = {$productos['ID_PRODUCTO']}"; ?>
                                                <?php $resultado = mysqli_query($db, $query); ?>
                                                <?php while ($p = mysqli_fetch_assoc($resultado)) : ?>
                                                        <tr>
                                                                <td><?php echo $p['NOMBRE']; ?></td>
                                                                <td><?php echo $p['MARCA']; ?></td>
                                                                <td><?php echo $p['TALLA']; ?></td>
                                                                <td><?php echo "$" . $p['PRECIO'] . ".00"; ?></td>
                                                                <?php $total = $total + $p['PRECIO']; ?>                                                               
                                                        </tr>                                                                                                        
                                                <?php endwhile; ?>

                                        <?php endwhile; ?>
                                </tbody>                              
                        </table>
                                                                
                
                <div class="total">
                        <p><span>TOTAL:</span> <?php echo "$" . $total . ".00"; ?> </p>
                        <form action="pago.php" method="POST">
                                <div class="izquierda">
                                        <!-- <a href="#" class="boton">Proceder al pago</a> -->                                                                                
                                        <input type="hidden" value="<?php echo $idUsuario?>" name="usuario">
                                        <input type="submit" value="Proceder al pago" class="boton">
                                </div>
                        </form>
                </div>
        </main>

        <footer class="footer">
                <div class="footer-texto">
                        <p>La mejor ropa de segunda mano en el mercado</p>
                </div>
        </footer>
</body>

</html>