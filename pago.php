<?php
#namespace de paypal
session_start();
require 'includes/app.php';
require 'config.php';
$nom = $_SESSION['NOMBRE'];
$idUsuario = $_SESSION['ID_USUARIO'];

use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

if ($nom == null && $idUsuario == null) {
        //no funciona?
        header('Location: /index.php');
}

$totalRopa = 0;
$NombreProductos = [];
$cantidadProductos = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST['usuario'];
        $query = "SELECT ID_PRODUCTO FROM CARRITO WHERE ID_USUARIO = {$idUsuario}";
        $resultadoConsultaProductos = mysqli_query($db, $query);    
                
        while ($productos = mysqli_fetch_assoc($resultadoConsultaProductos)){
                $query = "SELECT ID_PRODUCTO, NOMBRE, MARCA, TALLA, PRECIO FROM PRODUCTO WHERE ID_PRODUCTO = {$productos['ID_PRODUCTO']}";
                $resultado = mysqli_query($db, $query);
                while ($p = mysqli_fetch_assoc($resultado)){
                        $totalRopa = $totalRopa + $p['PRECIO'];
                        $NombreProductos[] = $p['NOMBRE'];
                        $cantidadProductos ++;
                }
        }        
} 

$producto = "Ropa Le piojé ". $nom;
$precio = $totalRopa;
$precio = (float)$precio;
$envio = 0;
$total = $precio + $envio;

#creamos una instancia de como se estará pagando
$compra = new Payer();
$compra->setPaymentMethod('paypal');
#asignamos el nombre del producto
$articulo = new Item();
$articulo -> setName($producto)
          -> setCurrency('MXN')
          -> setQuantity(1)
          -> setPrice($total);
 

#lista los articulos por los que pagará el usuario
$listaArticulos = new ItemList();
$listaArticulos -> setItems(array($articulo));

#detalles del articulo
$detalles = new Details();
$detalles -> setShipping($envio)
          -> setSubtotal($precio);

$cantidad = new Amount();
$cantidad -> setCurrency('MXN')
          -> setTotal($precio)
          -> setDetails($detalles);
          
$transaccion = new Transaction();
$transaccion ->setAmount($cantidad)
             ->setItemList($listaArticulos)
             ->setDescription('Pago ')
             ->setInvoiceNumber(uniqid());

$redireccionar = new RedirectUrls();
$redireccionar -> setReturnUrl(URL_SITIO . "pagoFinalizado.php?exito=true")
                ->setCancelUrl(URL_SITIO . "pagoFinalizado.php?exito=false");

$pago = new Payment();
$pago ->setIntent("sale")
      ->setPayer($compra)
      ->setRedirectUrls($redireccionar)
      -> setTransactions(array($transaccion));

try{
        $pago->create($apiContext);

}catch(PayPal\Exception\PayPalConnectionException $pce){
        print_r(json_decode($pce->getData()));
        exit();
}      

$aprobado = $pago->getApprovalLink();
header("Location: {$aprobado}");