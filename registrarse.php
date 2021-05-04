<?php
    require 'includes/app.php';
    
    $db = conectarDB();
    $errores = [];


    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        #filtrado de los datos
        $email = mysqli_real_escape_string($db, filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL));
        $contrasenia = mysqli_real_escape_string($db, $_POST['contrasenia']);
        #$email = mysqli_real_escape_string($db, filter-var($_POST['']));

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
    <title>Registro</title>
</head>

<body>
    <header class="registro-headerprincipal">
        <div class="contenedor">
            <div class="barra">               
                    <img class="logo_imagen invertir centrar" src="/Imagenes/logoNegro.png" alt="">
            </div>
        </div>
        <div class="header__texto">
            <h2 class="no-margin header__texto__h2">La mejor de ropa de segunda mano</h2>
        </div>
    </header>
    <div>
        <main>
            <form action="" class="registro-dividirFormulario" method="POST">
                <div class="registro-formulario">
                    <label for="">Nombre</label>
                    <input type="text" placeholder="tu nombre" name="name">
                    <label for="">Apellido Materno</label>
                    <input type="text" placeholder="Tu apellido Materno" name="apMaterno">
                    <label for="">Telefono</label>
                    <input type="tel" placeholder="Tu telefono" name="telefono">
                    <label for="">Estado</label>
                    <input type="text" placeholder="Tu estado" name="estado">
                    <label for="">Ciudad</label>
                    <input type="text" placeholder="Tu ciudad" name="ciudad">
                    <label for="">Calle</label>
                    <input type="text" placeholder="Tu calle" name="calle">
                    <label for="">Referencias</label>
                    <input type="text" placeholder="Ingresar referencias" name="referencias">
                    
                </div>
                <div class="registro-formulario">
                    <label for="">Apellido Paterno</label>
                    <input type="text" placeholder="Tu apellido Paterno" name="apPaterno">
                    <label for="">Correo</label>
                    <input type="email" placeholder="Tu correo" name="correo">
                    <label for="">Pais</label>
                    <select name="pais" id="">
                        <option value="">Mexico</option>                        
                    </select>
                    <label for="">Codigo postal</label>
                    <input type="text" placeholder="Tu codigo postal" name ="cp">
                    <label for="">Colonia</label>
                    <input type="text" placeholder="Tu colonia" name="colonia">
                    <label for="">Numero</label>
                    <input type="text" placeholder="Tu numero" name = "numero">
                    <label for="">Contraseña</label>
                    <input type="password" placeholder="Tu contraseña" name="contrasenia">
                    <button class="boton">Registrarse</button>


                </div>

            </form>
        </main>
    </div>
    <footer class="footer">
        <div class="footer-texto">
            <p>La mejor ropa de segunda mano en el mercado</p>
        </div>

    </footer>

</body>
</html>