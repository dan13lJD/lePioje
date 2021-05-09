let prendas = 0;

prenda = [{
    "NombreProducto": "Pantalones Hombre Azules",
    "Marca": "Oggi",
    "Talla": "M",
    "Precio": "500",
    "Descripción": "diam quis enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci sagittis eu volutpat odio facilisis mauris sit amet massa vitae tortor condimentum lacinia quis vel eros donec ac odio tempor orci dapibus ultrices in iaculis nunc sed augue lacus viverra vitae congue eu consequat ac felis donec"
}]

$(document).ready(function() {
    cargaInfo();
    numItems();
    mostrarSeccion();
    validarFormulario();
});

function formulario() {
    $("#subir-producto").click(function(event) {
        event.preventDefault();
        validarFormulario();
    });

}

function validarFormulario() {
    $("#formulario-producto").validate({
            rules: {
                nproducto: {
                    required: true,
                    maxlength: 20
                },

                mproducto: {
                    required: true,
                    maxlength: 20
                },
                cproducto: {
                    required: true,
                    maxlength: 15
                },
                tproducto: {
                    required: true,
                    maxlength: 4
                },
                pproducto: {
                    required: true
                },

                materialProducto: {
                    required: true
                },
                descripcionProducto: {
                    required: true,
                    maxlength: 50
                }
            },
            messages: {
                nproducto: {
                    required: "Debes ingresar un nombre del producto",
                    maxlength: "Maximo 20 caracteres!"
                },

                mproducto: {
                    required: "Debes ingresar una marca del producto",
                    maxlength: "Maximo 20 caracteres!"
                },
                cproducto: {
                    required: "Debes ingresar un color del producto",
                    maxlength: "Maximo 15 caracteres!"
                },
                pproducto: {
                    required: "Debes ingresar un precio del producto",
                },

                materialProducto: {
                    required: "Debes ingresar el material del producto",
                },
                descripcionProducto: {
                    required: "Debes ingresar una descripción del producto",
                    maxlength: "Maximo 50 caracteres"
                }
            }


        }

    );
}

function mostrarSeccion() {
    $("#perfil").click(function() {
        //muestra la sección de la barra de navegacion de la seccion del producto
        $("#seccion-producto").removeClass("mostrar-seccion");
        $("#contenido").addClass("mostrar-seccion");
    })
    $("#ventas").click(function() {
        //muestra la sección de la barra de navegacion de la seccion del producto
        $("#seccion-producto").removeClass("mostrar-seccion");
        $("#contenido").addClass("mostrar-seccion");
    })
    $("#historial").click(function() {
        //muestra la sección de la barra de navegacion de la seccion del producto
        $("#seccion-producto").removeClass("mostrar-seccion");
        $("#contenido").addClass("mostrar-seccion");
    })
    $("#producto").click(function() {
        //muestra la sección de la barra de navegacion de la seccion del producto
        $("#contenido").removeClass("mostrar-seccion");
        $("#seccion-producto").addClass("mostrar-seccion");
    })

    $("#1").click(function() {
        //muestra el formulario para publicar un producto
        //y oculta la seccion 2
        $("#seccion-2").removeClass("mostrar-seccion");
        $("#seccion-1").addClass("mostrar-seccion");
    })

    $("#2").click(function() {
        //muestra la sección 2 y oculta el formulario de publicar un producto
        $("#seccion-1").removeClass("mostrar-seccion");
        $("#seccion-2").addClass("mostrar-seccion");
    })
}

function cargaInfo() {
    p = prenda;
    $.each(prenda, function(i, item) {
        $('#nombre-producto').html(`${item.NombreProducto}`);
        $('#marca').html(`${item.Marca}`);
        $('#talla').html(`${item.Talla}`);
        $('#precio').html(`$${item.Precio}`);
        $('#descripcion').html(`${item.Descripción}`);
    })
}

function numItems() {
    $('#carrito').click(function() {
        prendas += 1;
        $('#cart_menu_num').html(`${prendas}`);
        alert('Prenda agregada al carrito!');
    })
}