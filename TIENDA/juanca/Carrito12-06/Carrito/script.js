var inicio = function(){
    $(".cantidad").click(function(e){
        var id = $(this).attr('data-id');
        var precio = $(this).attr('data-precio');
        var cantidad = $(this).val();
        alert(precio+" "+cantidad); 
        $(this).parentsUntil('.producto').find('.subt').text('Subtotal: '+(precio*cantidad));
        $.post("../php/modify.php",{
            Id:id,
            Precio:precio,
            Cantidad:cantidad
        },function(e){
            alert("2");
            $('#total').text('Total: '+e);
        });
    });
}
$(document).on('ready',inicio);