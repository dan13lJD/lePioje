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

$query = "SELECT * FROM VENTA WHERE ID_VENDEDOR = {$idUsuario}";
$venta = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Css/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
    <title>Ventas</title>
</head>

<body>
    <header>

        <div class="menu-titulo">
            <h1>VENTAS</h1>
        </div>
    </header>
    <main>
        <?php if (mysqli_num_rows($venta) > 0) : ?>
            <table class="productos">
                <thead>
                    <tr>
                        <th>ID Venta</th>
                        <th>ID Comprador</th>
                        <th>Nombre Producto</th>
                        <th>Precio</th>
                        <th>Estado de envio</th>
                        <!-- <th>Eliminar</th> -->
                    </tr>
                </thead>

                <tbody>
                    <?php while ($ventas = mysqli_fetch_assoc($venta)) : ?>

                        <tr>
                            <td><?php echo $ventas['ID_VENTA']; ?></td>
                            <td><?php echo $ventas['ID_COMPRADOR']; ?></td>
                            <td><?php echo $ventas['NOMBRE_PRODUCTO']; ?></td>
                            <td><?php echo $ventas['PRECIO']; ?></td>
                            <td><?php echo $ventas['STATUS_ENVIO']; ?></td>
                        </tr>

                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="tarjeta-producto">
                <img src="iconos/caja-blanca-vacia.svg" alt="vacio">
                <p class="centrar-texto"><span>Aún no has vendido productos.</span></p>
            </div>
        <?php endif; ?>
    </main>

</body>

</html>