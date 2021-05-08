$('#perfil').click(function(){
    var esperar=2000;
    $.ajax({
        url:'personal.php',
        success: function(data){
            setTimeout(function(){
                $('#contenido').html(data)
            }
            ); 

        }
    });
});
$('#producto').click(function(){
    var esperar=2000;
    $.ajax({
        url:'producto.php',
        success: function(data){
            setTimeout(function(){
                $('#contenido').html(data)
            }
            ); 

        }
    });
});
$('#ventas').click(function(){
    var esperar=2000;
    $.ajax({
        url:'ventas.php',
        success: function(data){
            setTimeout(function(){
                $('#contenido').html(data)
            }
            ); 

        }
    });
});
$('#historial').click(function(){
    var esperar=2000;
    $.ajax({
        url:'historial.php',
        success: function(data){
            setTimeout(function(){
                $('#contenido').html(data)
            }
            ); 

        }
    });
});