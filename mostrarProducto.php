<?php
require 'includes/app.php';
$db = conectarDB();
$boton1 = "";
//Variables fundamentales
$camisa = "";
$pantalon = "";
$chamarra = "";
$tenis = "";
$sudadera = "";
$sueter = "";
$accesorio = "";
$pants = "";
$short = "";
$aux = 0;
$i = 0;
$nombre = [];
$ruta = [];
$identificador = [];

//Esto es para mostrar productos de categoria Camisas para HOMBRES
if (isset($_POST['camisa'])) {
    $camisa = $_POST['camisa'];
}
if ($camisa) {
    $query = " SELECT DISTINCT IMG.ID_USUARIO, IMG.ID_PRODUCTO, IMG.NOMBRE_IMAGEN, P.NOMBRE, P.CATEGORIA, P.TIPO_PERSONA, P.ID_PRODUCTO,P.TIPO FROM IMAGENES_PRODUCTO IMG, PRODUCTO P WHERE  P.ID_PRODUCTO=IMG.ID_PRODUCTO AND P.TIPO_PERSONA='Hombre' AND P.CATEGORIA='Camisas' AND P.TIPO=1 GROUP BY IMG.ID_PRODUCTO;";
    $resultadoConsulta = mysqli_query($db, $query);
    if (mysqli_num_rows($resultadoConsulta) > 0) {
        while ($fila = mysqli_fetch_assoc($resultadoConsulta)) {
            $nombre[$i] = $fila['NOMBRE'];
            $identificador[$i] = $fila['ID_PRODUCTO'];
            $usuario = $fila['ID_USUARIO'];
            $producto = $fila['ID_PRODUCTO'];
            $imagen = $fila['NOMBRE_IMAGEN'] . $fila['NOMBRE_IMAGEN'];
            $ruta[$i] = "/usr/$usuario/$producto/$imagen";
            $i++;
        }
    }
}

//Esto es para mostrar productos de categoria Patanlones para HOMBRES

if (isset($_POST['pantalon'])) {
    $pantalon = $_POST['pantalon'];
}
if ($pantalon) {
    $query = " SELECT DISTINCT IMG.ID_USUARIO, IMG.ID_PRODUCTO, IMG.NOMBRE_IMAGEN, P.NOMBRE, P.CATEGORIA, P.TIPO_PERSONA, P.ID_PRODUCTO,P.TIPO FROM IMAGENES_PRODUCTO IMG, PRODUCTO P WHERE  P.ID_PRODUCTO=IMG.ID_PRODUCTO AND P.TIPO_PERSONA='Hombre' AND P.CATEGORIA='Pantalones' AND P.TIPO=1 GROUP BY IMG.ID_PRODUCTO;";
    $resultadoConsulta = mysqli_query($db, $query);
    $i = 0;
    if (mysqli_num_rows($resultadoConsulta) > 0) {
        while ($fila = mysqli_fetch_assoc($resultadoConsulta)) {
            $nombre[$i] = $fila['NOMBRE'];
            $identificador[$i] = $fila['ID_PRODUCTO'];
            $usuario = $fila['ID_USUARIO'];
            $producto = $fila['ID_PRODUCTO'];
            $imagen = $fila['NOMBRE_IMAGEN'] . $fila['NOMBRE_IMAGEN'];
            $ruta[$i] = "/usr/$usuario/$producto/$imagen";
            $i++;
        }
    }
}
//Esto es para mostrar productos de categoria Chamarra para HOMBRES
if (isset($_POST['chamarra'])) {
    $chamarra = $_POST['chamarra'];
}
if ($chamarra) {
    $query = " SELECT DISTINCT IMG.ID_USUARIO, IMG.ID_PRODUCTO, IMG.NOMBRE_IMAGEN, P.NOMBRE, P.CATEGORIA, P.TIPO_PERSONA, P.ID_PRODUCTO,P.TIPO FROM IMAGENES_PRODUCTO IMG, PRODUCTO P WHERE  P.ID_PRODUCTO=IMG.ID_PRODUCTO AND P.TIPO_PERSONA='Hombre' AND P.CATEGORIA='Chamarras' AND P.TIPO=1 GROUP BY IMG.ID_PRODUCTO;";
    $resultadoConsulta = mysqli_query($db, $query);
    $i = 0;
    if (mysqli_num_rows($resultadoConsulta) > 0) {
        while ($fila = mysqli_fetch_assoc($resultadoConsulta)) {
            $nombre[$i] = $fila['NOMBRE'];
            $identificador[$i] = $fila['ID_PRODUCTO'];
            $usuario = $fila['ID_USUARIO'];
            $producto = $fila['ID_PRODUCTO'];
            $imagen = $fila['NOMBRE_IMAGEN'] . $fila['NOMBRE_IMAGEN'];
            $ruta[$i] = "/usr/$usuario/$producto/$imagen";
            $i++;
        }
    }
}

//Esto es para mostrar productos de categoria Tenis para HOMBRES
if (isset($_POST['tenis'])) {
    $tenis = $_POST['tenis'];
}
if ($tenis) {
    $query = " SELECT DISTINCT IMG.ID_USUARIO, IMG.ID_PRODUCTO, IMG.NOMBRE_IMAGEN, P.NOMBRE, P.CATEGORIA, P.TIPO_PERSONA, P.ID_PRODUCTO,P.TIPO FROM IMAGENES_PRODUCTO IMG, PRODUCTO P WHERE  P.ID_PRODUCTO=IMG.ID_PRODUCTO AND P.TIPO_PERSONA='Hombre' AND P.CATEGORIA='Tenis' AND P.TIPO=1 GROUP BY IMG.ID_PRODUCTO;";
    $resultadoConsulta = mysqli_query($db, $query);
    $i = 0;
    if (mysqli_num_rows($resultadoConsulta) > 0) {
        while ($fila = mysqli_fetch_assoc($resultadoConsulta)) {
            $nombre[$i] = $fila['NOMBRE'];
            $identificador[$i] = $fila['ID_PRODUCTO'];
            $usuario = $fila['ID_USUARIO'];
            $producto = $fila['ID_PRODUCTO'];
            $imagen = $fila['NOMBRE_IMAGEN'] . $fila['NOMBRE_IMAGEN'];
            $ruta[$i] = "/usr/$usuario/$producto/$imagen";
            $i++;
        }
    }
}





//Esto es para mostrar productos de categoria Sudaderas para HOMBRES
if (isset($_POST['sudadera'])) {
    $sudadera = $_POST['sudadera'];
}
if ($sudadera) {
    $query = " SELECT DISTINCT IMG.ID_USUARIO, IMG.ID_PRODUCTO, IMG.NOMBRE_IMAGEN, P.NOMBRE, P.CATEGORIA, P.TIPO_PERSONA, P.ID_PRODUCTO,P.TIPO FROM IMAGENES_PRODUCTO IMG, PRODUCTO P WHERE  P.ID_PRODUCTO=IMG.ID_PRODUCTO AND P.TIPO_PERSONA='Hombre' AND P.CATEGORIA='sudaderas' AND P.TIPO=1 GROUP BY IMG.ID_PRODUCTO;";
    $resultadoConsulta = mysqli_query($db, $query);
    $i = 0;
    if (mysqli_num_rows($resultadoConsulta) > 0) {
        while ($fila = mysqli_fetch_assoc($resultadoConsulta)) {
            $nombre[$i] = $fila['NOMBRE'];
            $identificador[$i] = $fila['ID_PRODUCTO'];
            $usuario = $fila['ID_USUARIO'];
            $producto = $fila['ID_PRODUCTO'];
            $imagen = $fila['NOMBRE_IMAGEN'] . $fila['NOMBRE_IMAGEN'];
            $ruta[$i] = "/usr/$usuario/$producto/$imagen";
            $i++;
        }
    }
}
//Esto es para mostrar productos de categoria Sueteres para HOMBRES
if (isset($_POST['sueter'])) {
    $sueter = $_POST['sueter'];
}
if ($sueter) {
    $query = " SELECT DISTINCT IMG.ID_USUARIO, IMG.ID_PRODUCTO, IMG.NOMBRE_IMAGEN, P.NOMBRE, P.CATEGORIA, P.TIPO_PERSONA, P.ID_PRODUCTO,P.TIPO FROM IMAGENES_PRODUCTO IMG, PRODUCTO P WHERE  P.ID_PRODUCTO=IMG.ID_PRODUCTO AND P.TIPO_PERSONA='Hombre' AND P.CATEGORIA='sueteres' AND P.TIPO=1 GROUP BY IMG.ID_PRODUCTO;";
    $resultadoConsulta = mysqli_query($db, $query);
    $i = 0;
    if (mysqli_num_rows($resultadoConsulta) > 0) {
        while ($fila = mysqli_fetch_assoc($resultadoConsulta)) {
            $nombre[$i] = $fila['NOMBRE'];
            $identificador[$i] = $fila['ID_PRODUCTO'];
            $usuario = $fila['ID_USUARIO'];
            $producto = $fila['ID_PRODUCTO'];
            $imagen = $fila['NOMBRE_IMAGEN'] . $fila['NOMBRE_IMAGEN'];
            $ruta[$i] = "/usr/$usuario/$producto/$imagen";
            $i++;
        }
    }
}
//Esto es para mostrar productos de categoria Accesorios para HOMBRES
if (isset($_POST['accesorio'])) {
    $accesorio = $_POST['accesorio'];
}
if ($accesorio) {
    $query = " SELECT DISTINCT IMG.ID_USUARIO, IMG.ID_PRODUCTO, IMG.NOMBRE_IMAGEN, P.NOMBRE, P.CATEGORIA, P.TIPO_PERSONA, P.ID_PRODUCTO,P.TIPO FROM IMAGENES_PRODUCTO IMG, PRODUCTO P WHERE  P.ID_PRODUCTO=IMG.ID_PRODUCTO AND P.TIPO_PERSONA='Hombre' AND P.CATEGORIA='accesorios' AND P.TIPO=1 GROUP BY IMG.ID_PRODUCTO;";
    $resultadoConsulta = mysqli_query($db, $query);
    $i = 0;
    if (mysqli_num_rows($resultadoConsulta) > 0) {
        while ($fila = mysqli_fetch_assoc($resultadoConsulta)) {
            $nombre[$i] = $fila['NOMBRE'];
            $identificador[$i] = $fila['ID_PRODUCTO'];
            $usuario = $fila['ID_USUARIO'];
            $producto = $fila['ID_PRODUCTO'];
            $imagen = $fila['NOMBRE_IMAGEN'] . $fila['NOMBRE_IMAGEN'];
            $ruta[$i] = "/usr/$usuario/$producto/$imagen";
            $i++;
        }
    }
}
//Esto es para mostrar productos de categoria PANTS para HOMBRES
if (isset($_POST['pants'])) {
    $pants = $_POST['pants'];
}
if ($pants) {
    $query = " SELECT DISTINCT IMG.ID_USUARIO, IMG.ID_PRODUCTO, IMG.NOMBRE_IMAGEN, P.NOMBRE, P.CATEGORIA, P.TIPO_PERSONA, P.ID_PRODUCTO,P.TIPO FROM IMAGENES_PRODUCTO IMG, PRODUCTO P WHERE  P.ID_PRODUCTO=IMG.ID_PRODUCTO AND P.TIPO_PERSONA='Hombre' AND P.CATEGORIA='pants' AND P.TIPO=1 GROUP BY IMG.ID_PRODUCTO;";
    $resultadoConsulta = mysqli_query($db, $query);
    $i = 0;
    if (mysqli_num_rows($resultadoConsulta) > 0) {
        while ($fila = mysqli_fetch_assoc($resultadoConsulta)) {
            $nombre[$i] = $fila['NOMBRE'];
            $identificador[$i] = $fila['ID_PRODUCTO'];
            $usuario = $fila['ID_USUARIO'];
            $producto = $fila['ID_PRODUCTO'];
            $imagen = $fila['NOMBRE_IMAGEN'] . $fila['NOMBRE_IMAGEN'];
            $ruta[$i] = "/usr/$usuario/$producto/$imagen";
            $i++;
        }
    }
}
//Esto es para mostrar productos de categoria SHORTS para HOMBRES
if (isset($_POST['shorts'])) {
    $short = $_POST['shorts'];
}
if ($short) {
    $query = " SELECT DISTINCT IMG.ID_USUARIO, IMG.ID_PRODUCTO, IMG.NOMBRE_IMAGEN, P.NOMBRE, P.CATEGORIA, P.TIPO_PERSONA, P.ID_PRODUCTO,P.TIPO FROM IMAGENES_PRODUCTO IMG, PRODUCTO P WHERE  P.ID_PRODUCTO=IMG.ID_PRODUCTO AND P.TIPO_PERSONA='Hombre' AND P.CATEGORIA='Shorts' AND P.TIPO=1 GROUP BY IMG.ID_PRODUCTO;";
    $resultadoConsulta = mysqli_query($db, $query);
    $i = 0;
    if (mysqli_num_rows($resultadoConsulta) > 0) {
        while ($fila = mysqli_fetch_assoc($resultadoConsulta)) {
            $nombre[$i] = $fila['NOMBRE'];
            $identificador[$i] = $fila['ID_PRODUCTO'];
            $usuario = $fila['ID_USUARIO'];
            $producto = $fila['ID_PRODUCTO'];
            $imagen = $fila['NOMBRE_IMAGEN'] . $fila['NOMBRE_IMAGEN'];
            $ruta[$i] = "/usr/$usuario/$producto/$imagen";
            $i++;
        }
    }
}
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
    <title>Document</title>
</head>

<body>
    <header class="hombre">
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
                <form action="" method="POST">
                    <input type="submit" name="camisa" value="camisa">
                    <input type="submit" name="pantalon" value="pantalon">
                    <input type="submit" name="chamarra" value="chamarra">
                    <input type="submit" name="tenis" value="tenis">
                    <input type="submit" name="sudadera" value="sudadera">
                    <input type="submit" name="sueter" value="sueter">
                    <input type="submit" name="accesorio" value="accesorio">
                    <input type="submit" name="pants" value="pants">
                    <input type="submit" name="shorts" value="shorts">

                </form>
            </nav>
        </div>
    </header>
    <main>

        <div class="contenedor ropaHombre">
            <?php
            foreach ($ruta as $rut) {
                //Este FOREACH es para mostrar los productos (TODA CATEGORIA DE HOMBRE) y darles el valor de su id a los inputs
            ?>
                <div>
                    <h2><?php echo $nombre[$aux] ?></h2>
                    <img src="<?php echo $rut ?>" alt="img">
                    <a class="boton" href="productoIndividual.php?ID=<?php echo $identificador[$aux] ?>">VER</a>
                </div>
            <?php
                $aux++;
            }

            ?>
        </div>


    </main>









    <script src="JS/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="JS/app.js"></script>
</body>

</html>