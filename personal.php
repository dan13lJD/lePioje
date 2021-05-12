<?php
    require 'includes/app.php';
    $db = conectarDB();
    session_start();
    $nom=$_SESSION['NOMBRE'];
    $id=$_SESSION['ID_USUARIO'];
    $query = "SELECT * FROM USUARIOS WHERE ID_USUARIO = '{$id}'";
    $resultado= mysqli_query($db, $query);
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
    <header class="personal-headerprincipal">
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
    </header>

    <main>
        <form action="includes/perfilMod.php" method="POST" class="registro-dividirFormulario">
        <?php
        while($mostrar=mysqli_fetch_array($resultado)){
        ?>
        <div class="registro-formulario">
            
                    <label for="">Correo</label>
                    <input type="email" placeholder="Tu correo" name="correo" value="<?php echo $mostrar['CORREO']?>">

                    <label for="">Nombre</label>
                    <input type="text" placeholder="tu nombre" name="name" value="<?php echo $mostrar['NOMBRE']?>">

                    <label for="">Apellido Paterno</label>
                    <input type="text" placeholder="Tu apellido Paterno" name="apPaterno" value="<?php echo $mostrar['APELLIDO_P']?>">
                    
                    <label for="">Apellido Materno</label>
                    <input type="text" placeholder="Tu apellido Materno" name="apMaterno" value="<?php echo $mostrar['APELLIDO_M']?>">

                    <label for="telefono">Telefono</label>
                    <input type="tel" name="telefono" id="telefono" placeholder="Tu numero de telefono" value="<?php echo $mostrar['TELEFONO']?>">

                    <label for="pais">Pais</label>
                    <input type="text" name="pais" id="pais" value="<?php echo $mostrar['PAIS']?>">
                    <label for="">Referencias</label>
                    <input type="text" placeholder="Ingresar referencias" name="referencias" value="<?php echo $mostrar['REFERENCIAS']?>">
        </div>
        <div class="registro-formulario">
                    <label for="">Estado</label>
                    <input type="text" placeholder="Tu estado" name="estado" value="<?php echo $mostrar['ESTADO']?>">
                    
                    <label for="">Ciudad</label>
                    <input type="text" placeholder="Tu ciudad" name="ciudad" value="<?php echo $mostrar['CIUDAD']?>">

                    <label for="">Codigo postal</label>
                    <input type="text" placeholder="Tu codigo postal" name="cp" value="<?php echo $mostrar['CP']?>">

                    <label for="">Calle</label>
                    <input type="text" placeholder="Tu calle" name="calle" value="<?php echo $mostrar['CALLE']?>">                    

                    <label for="">Colonia</label>
                    <input type="text" placeholder="Tu colonia" name="colonia" value="<?php echo $mostrar['COLONIA']?>">

                    <label for="">Numero</label>
                    <input type="text" placeholder="Numero" name="numero" value="<?php echo $mostrar['NUMERO']?>">
                    <button class="boton">Subir cambios</button>
        </div>
        <?php
        }
        ?>
        </form>
    </main>


</body>
</html>