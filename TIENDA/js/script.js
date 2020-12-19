var inicio = function(){
    $(".cantidad").click(function(e){
        var id = $(this).attr('data-id');
        var precio = parseFloat($(this).attr('data-precio'));
        var cantidad = parseFloat($(this).val());
        var id1 ="st"+id;
//        alert(precio+" "+cantidad);
        /*Se supone que con esta linea deberia hacer que el valor del subtotal cambie*/
//        $('.subt').text('Subtotal: '+(precio*cantidad));
        document.getElementById(id1).innerHTML = precio*cantidad;
        $.post("./modify.php",{
            Id:id,
            Precio:precio,
            Cantidad:cantidad
        },function(e){
//            alert("2");
            //aqui cambio el total con el archivo modify.php
            $('#total').text(e);
        });
    });
}
$(document).on('ready',inicio);

