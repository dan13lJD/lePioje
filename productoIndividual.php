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
        
        <title>Le pioje</title>
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
                            <a href="#">
                                <i><img class="invertir" src="iconos/volver-flecha.svg" alt="">Volver</i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i><img class="invertir" src="iconos/usuario.svg" alt="">Perfil</i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="cart">
                                <i><img class="invertir" src="iconos/carrito.svg" alt="">Carrito</i>
                                <span id="cart_menu_num" data-action="cart-can" class="badge rounded-circle">0</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <main>
            <div>
                <h1 class="centrar-texto">Pantalon</h1>
                <div class="contenedor-productos">
                    <div class="">
                        <!-- imagenes -->
                        <h4 class="centrar-texto">Imágenes del producto</h4>

                        <ul class="galeria">
                            <li><a href="#img1"><img src="Imagenes/pantalones1.jpg"></a></li>
                            <li><a href="#img2"><img src="Imagenes/pantalones2.jpg"></a></li>
                            <li><a href="#img3"><img src="Imagenes/pantalones3.jpg"></a></li>
                            <li><a href="#img4"><img src="Imagenes/pantalones4.jpg"></a></li>
                        </ul>

                        <div class="modal" id="img1">
                            <div class="imagen">
                                <a href="#img4">&#60;</a>
                                <a href="#img2"><img src="Imagenes/pantalones1.jpg"></a>
                                <a href="#img2">></a>
                            </div>
                            <a class="cerrar" href="">X</a>
                        </div>

                        <div class="modal" id="img2">
                            <div class="imagen">
                                <a href="#img1">&#60;</a>
                                <a href="#img3"><img src="Imagenes/pantalones2.jpg"></a>
                                <a href="#img3">></a>
                            </div>
                            <a class="cerrar" href="">X</a>
                        </div>

                        <div class="modal" id="img3">

                            <div class="imagen">
                                <a href="#img2">&#60;</a>
                                <a href="#img4"><img src="Imagenes/pantalones3.jpg"></a>
                                <a href="#img4">></a>
                            </div>
                            <a class="cerrar" href="">X</a>
                        </div>

                        <div class="modal" id="img4">
                            <div class="imagen">
                                <a href="#img3">&#60;</a>
                                <a href="#img1"><img src="Imagenes/pantalones4.jpg"></a>
                                <a href="#img1">></a>
                            </div>
                            <a class="cerrar" href="">X</a>
                        </div>
                    </div>

                    <div class="informacion">
                        <!-- informacion del producto -->
                        <h4 class="centrar-texto">Información del producto</h4>
                        <p>Nombre de la prenda: <span id="nombre-producto"></span></p>
                        <p>Marca: <span id="marca"></span></p>
                        <p>Talla: <span id="talla"></span></p>
                        <p>Precio: <span id="precio"></span></p>
                        <p>Descripción: <span id="descripcion"></span></p>

                        <input class="boton" id="carrito" type="button" value="Agregar al carrito">
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