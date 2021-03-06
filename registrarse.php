<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'includes/app.php';
$db = conectarDB();
$errores = [];
#iniciamos las variables para que no se borren al momento de ingresar datos erroneos

$correo = '';
$contrasenia = '';
$nombre = '';
$apMaterno = '';
$apPaterno = '';
$telefono  = '';
$estado = '';
$colonia = '';
$calle = '';
$numero = '';
$cp = '';
$referencias = '';
$ciudad = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    #filtrado de los datos
    $correo = mysqli_real_escape_string($db, filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL));
    $contrasenia = mysqli_real_escape_string($db, $_POST['contrasenia']);
    $nombre = mysqli_real_escape_string($db, $_POST['name']);
    $apMaterno = mysqli_real_escape_string($db, $_POST['apMaterno']);
    $apPaterno = mysqli_real_escape_string($db, $_POST['apPaterno']);
    $telefono  = mysqli_real_escape_string($db, $_POST['telefono']);
    $estado = mysqli_real_escape_string($db, $_POST['estado']);
    $colonia = mysqli_real_escape_string($db, $_POST['colonia']);
    $calle = mysqli_real_escape_string($db, $_POST['calle']);
    $numero = mysqli_real_escape_string($db, $_POST['numero']);
    $cp = mysqli_real_escape_string($db, $_POST['cp']);
    $referencias = mysqli_real_escape_string($db, $_POST['referencias']);
    $ciudad = mysqli_real_escape_string($db, $_POST['ciudad']);
    $pais = mysqli_real_escape_string($db, $_POST['pais']);
    #preparamos una consulta para verificar si el correo no se ha registrado ya dos veces
    $query = "SELECT CORREO FROM USUARIOS WHERE CORREO = '{$correo}'";
    #consultamos en la BD si ya existe el correo e
    $resultado = mysqli_num_rows(mysqli_query($db, $query));
    if($resultado>1){
        $errores[] = "Ya hay una cuenta asociada con el correo electronico que intentas usar";
    }

    if(!$ciudad){
        $errores[] = "Ingresa tu ciudad";
    }
    if(!$correo){
        $errores[] = "El email es obligatorio";
    }

    if(!$contrasenia){
        $errores[] = "Ingresa una contrase??a";    
    }

    if(!$nombre){
        $errores[] = "Ingresa tu nombre";        
    }
    
    if(!$apPaterno){
        $errores[] = "Ingresa tu apellido paterno";
    }

    if(!$apMaterno){
        $errores[] = "Ingresa tu apellido materno";
    }

    if(!$telefono){
        $errores[] = "Ingresa tu Numero de celular";
    }

    if(!$estado){
        $errores[] = "Ingresa tu estado";        
    }
    
    if(!$colonia){
        $errores[] = "Ingresa tu colonia";                
    }

    if(!$calle){
        $errores[] = "Ingresa tu calle";
    }

    if(!$numero){
        $errores[] = "Ingresa el numero de casa";
    }

    if(!$cp){
        $errores[] = "Ingresa el c??digo postal";
    }

    if(!$referencias){
        $errores[] = "Ingresa las referencias";
    }

    #si el arreglo de errores esta vacio, entonces:
    if(empty($errores)){
        
        #primero hasheamos la contrase??a
        $passwordHash = password_hash($contrasenia, PASSWORD_DEFAULT);               
        #prepararamos la consulta
        $query = "INSERT INTO usuarios(NOMBRE, APELLIDO_P, APELLIDO_M, CORREO, TELEFONO, CONTRASENIA, PAIS, ESTADO, CIUDAD, COLONIA, CALLE, REFERENCIAS, CP, NUMERO) 
                  VALUES ('{$nombre}', '{$apPaterno}', '{$apMaterno}', '{$correo}', '{$telefono}', '{$passwordHash}', '{$pais}', '{$estado}', '{$ciudad}', '{$colonia}', '{$calle}', '{$referencias}', {$cp},{$numero});";
        #procedemos a insertar en la BD
        $resultado = mysqli_query($db, $query);
        
        if($resultado){
            $mail = new PHPMailer(true);




try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'LePiojeOficial@gmail.com';                     //SMTP username
    $mail->Password   = 'lanadelrey';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('LePiojeOficial@gmail.com', 'LePioje');
    $mail->addAddress($correo);   //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Bienvenido a Le Pioje';
    $mail->Body    = "Gracias {$nombre} por suscribirte a Le Pioje, un proyecto que busca ayudar a personas
    que se han visto afectadas economicamente a causa de la crisis santiraria actual. \n \n Atentamente los creadores
    de Le Pioje Kevin Stuart Somera Rodriguez y Daniel Jimenez Diaz";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
           header('Location: /login.php');
        }
        echo "hubo un error";

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
        <h1 class="centrar-texto">Registrarse</h1>

        <?php foreach($errores as $error):?>
            <div class="alerta error centrar-texto">
                <?php
                    echo $error;
                ?>
            </div>
        <?php endforeach;?>

        <main>
            <form action="" class="registro-dividirFormulario" method="POST">
                <div class="registro-formulario">

                    <label for="">Correo</label>
                    <input type="email" placeholder="Tu correo" name="correo" value="<?php echo $correo;?>">

                    <label for="">Contrase??a</label>
                    <input type="password" placeholder="Tu contrase??a" name="contrasenia" value="<?php echo $contrasenia;?>">

                    <label for="">Nombre</label>
                    <input type="text" placeholder="tu nombre" name="name" value="<?php echo $nombre;?>">

                    <label for="">Apellido Paterno</label>
                    <input type="text" placeholder="Tu apellido Paterno" name="apPaterno" value="<?php echo $apPaterno;?>">
                    
                    <label for="">Apellido Materno</label>
                    <input type="text" placeholder="Tu apellido Materno" name="apMaterno" value="<?php echo $apMaterno;?>">

                    <label for="telefono">Telefono</label>
                    <input type="tel" name="telefono" id="telefono" placeholder="Tu numero de telefono" value="<?php echo $telefono;?>">

                    <label for="pais">Pais</label>
                    <select name="pais" id="pais">
                        <option value="Mexico">Mexico</option>
                    </select>
                </div>
                <div class="registro-formulario">
                    <label for="">Estado</label>
                    <input type="text" placeholder="Tu estado" name="estado" value="<?php echo $estado;?>">
                    
                    <label for="">Ciudad</label>
                    <input type="text" placeholder="Tu ciudad" name="ciudad" value="<?php echo $ciudad;?>">

                    <label for="">Codigo postal</label>
                    <input type="text" placeholder="Tu codigo postal" name="cp" value="<?php echo $cp;?>">

                    <label for="">Calle</label>
                    <input type="text" placeholder="Tu calle" name="calle" value="<?php echo $calle;?>">                    

                    <label for="">Colonia</label>
                    <input type="text" placeholder="Tu colonia" name="colonia" value="<?php echo $colonia;?>">

                    <label for="">Numero</label>
                    <input type="text" placeholder="Numero" name="numero" value="<?php echo $numero;?>">

                    <label for="">Referencias</label>
                    <input type="text" placeholder="Ingresar referencias" name="referencias" value="<?php echo $referencias;?>">

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