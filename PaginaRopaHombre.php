<?php
require 'includes/app.php';
$db = conectarDB();
        $query="SELECT DISTINCT ID_USUARIO, ID_PRODUCTO, NOMBRE_IMAGEN FROM IMAGENES_PRODUCTO GROUP BY ID_PRODUCTO";
         $resultadoConsulta = mysqli_query($db, $query);
         $ruta=[];
         $nombre=[];
         $i=0;

    if(mysqli_num_rows($resultadoConsulta)>0){
     while($fila=mysqli_fetch_assoc($resultadoConsulta)){
        
       
        $usuario=$fila['ID_USUARIO'];
        $producto=$fila['ID_PRODUCTO'];
        $imagen=$fila['NOMBRE_IMAGEN'].$fila['NOMBRE_IMAGEN'];
        $ruta[$i]="/usr/$usuario/$producto/$imagen";
        $i++;
     }}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <button type="button" id="perfil">Camisas</button>
                <button type="button" id="producto">Pantalones</button>
                <button type="button" id="ventas">Zapatos</button>
                <button type="button" id="historial">Sudaderas</button>
            </nav>
        </div>
    </header>
    <div class="contenedor ropaHombre">
        <?php
        foreach($ruta as $rut){
            
        
        ?>
        <div>
        <h1>articulo</h1>
        <img src="<?php echo $rut?>" alt="img">
        </div>
        <?php
        }
        ?>    
    </div>




</body>
</html>