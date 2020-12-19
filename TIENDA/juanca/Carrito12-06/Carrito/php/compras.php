<?php
    session_start();
    $arreglo = $_SESSION['carrito'];
    $j=0;$envio = 150;$stotal = 0;
    for($i = 0;$i < count($arreglo);$i++){            
        $subt = $arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'];
        $stotal += $subt;
    }
    $imp = ($stotal*.16);//impuestos
?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="../js/script.js"></script>
    <script>
        function validar(){
            var pago = document.getElementsByName('pago');            
            if(pago[0].checked){
                //descativar required
            }
            if(pago[1].checked){
                //mandar a otra pagina
                alert("Este boton genera ficha de pago OXXO");
            }
        }
    </script>
</head>
<body>
   <h1>Confirmar Compra!!!</h1>
   <form action="confirmacion.php" method="post">
   <table>
      <tr>
          <th colspan="2">Formas de pago</th>
          <th>A donde enviamos tu pedido?</th>
      </tr>
      <tr>
          <td><input type="radio" name="pago" value="tarjeta" checked id="tarjeta"></td>
          <td><input type="radio" name="pago" value="oxxo" id="oxxo"></td>
      </tr>
       <tr>
           <td>
                <table id="p_tar">
                  <tr>
                       <td colspan="2">
                          <label for="num">No. Tarjeta: </label>
                       </td>
                       <td colspan="2">
                           <input type="text" name="num" required pattern="^\d{16}$">
                       </td>
                   </tr>
                   <tr>
                       <td>
                          <label for="mm">MM: </label>
                        </td>
                        <td>
                           <input type="number" name="mm" max="12" required>
                       </td>
                        <td>
                            <label for="yy">YY: </label>
                        </td>
                        <td>
                            <input type="number" name="yy" max="99" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="cvv">Codigo CVV: </label>
                        </td>
                        <td colspan="2">
                            <input type="number" name="cvv" max="999" required>
                        </td>
                    </tr>   
                    <tr>
                        <td>
                            <label for="namt">Nombre: </label>
                        </td>
                        <td>
                            <input type="text" name="namt" required>
                        </td>
                        <td>
                            <label for="app">Apellidos: </label>
                        </td>
                        <td>
                            <input type="text" name="app" required>
                        </td>
                    </tr>
               </table>
           </td>
           <td>
               <input type="button" value="Pago en OXXO..." onclick="validar();">
           </td>
           <td>
               <table>
                   <tr> 
                       <td colspan="2">
                           <label for="name">Nombre Completo: </label>
                       </td>
                       <td colspan="2">
                           <input type="text" name="name" required>
                       </td>
                   </tr>
                   <tr>
                       <td colspan="2">
                           <label for="mail">Correo Electronico:</label>
                        </td>
                        <td colspan="2">
                           <input type="mail" name="mail" required>
                       </td>
                   </tr>
                   <tr>
                       <td colspan="2">
                           <label for="cell">No. Telefono: </label>
                        </td>
                        <td colspan="2">
                           <input type="text" name="cell" class="telefono" pattern="\x2b[0-9]+" required>
                       </td>
                   </tr>
                   <tr>
                       <td>
                           <label for="dir">Direccion: </label>
                        </td>
                        <td>
                           <input type="text" name="dir" required>
                       </td>
                       <td>
                           <label for="cp">Codigo Postal: </label>
                        </td>
                        <td>
                           <input type="number" name="cp" required max="99999">
                       </td>
                   </tr>
                   <tr>
                       <td>
                           <label for="cy">Ciudad: </label>
                        </td>
                        <td>
                           <input type="text" name="cy" required>
                       </td>
                       <td>
                           <label for="pais">Pais: </label>
                        </td>
                        <td>
                          <input type="text" name="pais">
                       </td>
                   </tr>
               </table>
           </td>
       </tr>
   </table>
   
    <?php
    echo "<h2>Compras: $ $stotal</h2>";
    echo "<h3 id='iva-tax'>Impuestos: $ $imp</h3>";
    echo "<h4>Envio: $ $envio.00 </h4>";
    $total = $stotal + $imp + $envio; 
    echo "<h2 id='total'>Total: $ $total</h2>";
?>
<button type="submit">Aceptar</button>
    </form>
<!--        el boton aun no hace nada-->
</body>
</html>