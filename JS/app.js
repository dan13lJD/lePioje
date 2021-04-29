var prendas = 0;
prenda = [{
    "NombreProducto": "Pantalones Hombre Azules",
    "Marca": "Oggi",
    "Talla": "M",
    "Precio": "500", 
    "Descripción": "diam quis enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci sagittis eu volutpat odio facilisis mauris sit amet massa vitae tortor condimentum lacinia quis vel eros donec ac odio tempor orci dapibus ultrices in iaculis nunc sed augue lacus viverra vitae congue eu consequat ac felis donec"
}]
$(document).ready(function () {
    cargaInfo();
    numItems();
});

function cargaInfo(){
    p = prenda;
    $.each(prenda, function(i, item){
        $('#nombre-producto').html(`${item.NombreProducto}`);
        $('#marca').html(`${item.Marca}`);
        $('#talla').html(`${item.Talla}`);
        $('#precio').html(`$${item.Precio}`);
        $('#descripcion').html(`${item.Descripción}`);
    })
}
function numItems() {
    $('#carrito').click(function (){
        prendas+=1;
        $('#cart_menu_num').html(`${prendas}`);
        alert('Prenda agregada al carrito!');
    })
}