var inicio = function(){
    $(".cantidad").click(function(e){
        var id = $(this).attr('data-id');
        var precio = $(this).attr('data-precio');
        var cantidad = $(this).val();
//        alert(precio+" "+cantidad);
        /*Se supone que con esta linea deberia hacer que el valor del subtotal cambie*/
        $(this).parentsUntil('.producto').find('.subt').text('Subtotal: '+(precio*cantidad));
        $.post("../php/modify.php",{
            Id:id,
            Precio:precio,
            Cantidad:cantidad
        },function(e){
//            alert("2");
            //aqui cambio el total con el archivo modify.php
            $('#total').text('Total: '+e);
        });
    });
}
$(document).on('ready',inicio);

var otro = function(){
    alert("hola");
    $(".paises").click(function(e){
        alert("fol");
        var paises = document.getElementById('pais');
        var ax = $(this).attr('data-stotal');                                   
        if(paises[0].value == 'Mexico'){                                    
            document.getElementById('iva-tax').innerHTML = 'Impuestos: $ '+(ax*0.16);
        }else if(paises[1].value == 'EUA'){
            document.getElementById('iva-tax').innerHTML = 'Impuestos (Moneda Nacional): $ '+((ax/20)*0.06)*20;
        }
    });
}
$(document).on('ready',otro);