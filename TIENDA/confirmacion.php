<?php
    session_start();
    $arreglo = $_SESSION['carrito'];
    $j=0;
    include ('conexion.php');
    $con = conectar();
    $dat = mysqli_query($con,"select * from datos_venta") or die("Error");
    //Para enviar por correo                    ------------------------
    $envio = 0;$stotal = 0;$imp=0;
    for($i = 0;$i < count($arreglo);$i++){            
        $subt = $arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'];
        $stotal += $subt;
    }
    $pais = $_POST['pais'];
    $tenv = $_POST['tenvio'];   
    $pago = $_POST['pago'];
    
    if($pais == 'Mexico'){
        $imp = ($stotal*.16);    //impuestos Mexico
    }else if($pais == 'EUA'){
        $imp = (($stotal/20)*0.06)*20;//impuestos EUA
    }
    if($tenv == 'gratis'){
        $envio = 0;
    }else{
        $envio = $stotal*.02;
    }
    
    $nom_cl = $_POST['name'];
    $mail_cl = $_POST['mail'];
    $tel_cl = $_POST['cell'];
    $dir_cl = $_POST['dir'];
    $cp_cl = $_POST['cp'];
    $ciudad_cl = $_POST['cy'];
    $pais_cl = $_POST['pais'];
    $cup = $_POST['cupon'];
    
    //Definicion QR---------------      ------------    ---------   ----------  ------  ----
    $textqr = 'Pago realizado con exito';     //mailto:el_ennano@icloud.com?subject=Gracias por tu compra&body=Tu pago ha sido realizado. Sigue Comprando con nosotros...
    //-------------    ----------- -    --- --------    -------

    $total = $stotal + $envio + $imp;//calculos Necesario para enviar por correo

    while($ax = mysqli_fetch_array($dat)){
        $j++;
    }
    //Necesario para enviar hasta aqui, por ahora           -----   -----   -----   -----   -----   -----   -----
    mysqli_query($con,"INSERT INTO `datos_venta`(`no_venta`, `subtotal`, `envio`, `envio_$`, `enviar_a`, `total`,`t_pago`) VALUES ($j,$stotal,'$tenv',$envio,'$pais',$total,'$pago')") or die(mysqli_error($con));

    mysqli_query($con,"INSERT INTO `clientes`(`no_vta`, `nombre`, `correo`, `telefono`, `direccion`, `cp`, `ciudad`, `pais`) VALUES ($j,'$nom_cl','$mail_cl','$tel_cl','$dir_cl','$cp_cl','$ciudad_cl','$pais_cl')") or die(mysqli_error($con));

//    Con este for inserto los datos del carrito a una tabla llamada compras
    for($i = 0;$i < count($arreglo);$i++){
        $id = $arreglo[$i]['Id'];
        $nombre = $arreglo[$i]['Nombre'];
        $subt = $arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'];
        $can = $arreglo[$i]['Cantidad'];
        $ex = $arreglo[$i]['Existencia'];
        $img = $arreglo[$i]['Imagen'];
        mysqli_query($con,"INSERT INTO `ventas`(`no_venta`,`id_p`, `nombre_p`, `subtotal_p`, `cantidad_p`, `imagen_p`) VALUES ($j,'$id','$nombre','$subt','$can','$img');") or die(mysqli_error($con)."aqui");
        if($id<200)
            mysqli_query($con,"UPDATE `playeras` SET `existencia`= $ex-1 WHERE `id`= '$id'") or die(mysqli_error($con));   
        else
            mysqli_query($con,"UPDATE `sudaderas` SET `existencia`= $ex-1 WHERE `id`= '$id'") or die(mysqli_error($con));   
    }
?>   

<!--Neceario para enviar por correo-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
   <div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>corrientefluye.com</strong>
                        <br>
                        Todos los derechos reservados 2019
                        <br>
                        Aguascalientes, Ags 20000
                        <br>
                        <abbr title="Phone">Tel:</abbr> (213) 123-4567
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Fecha: <?php date_default_timezone_set('America/Mexico_City'); $hoy = getdate(); echo $hoy['year']."/".$hoy['mon']."/".$hoy['mday'];?></em>
                    </p>
                    <p>
                        <em>Recibo #: <?php echo $j;?> </em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <img src="media/logo.jpg" alt="allytees-500-trans.png" width="180" height="180">
                    <h1>Recibo</h1>
                </div>
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php for($i = 0;$i<count($arreglo);$i++){?>
                        <tr>
                            <td class="col-md-9"><?php echo $arreglo[$i]['Nombre'];?></td>
                            <td class="col-md-1" style="text-align: center"><?php echo$arreglo[$i]['Cantidad'];?></td>
                            <td class="col-md-1 text-center"><?php echo $arreglo[$i]['Precio'] ?></td>
                            <td class="col-md-1 text-center"><?php echo ($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']); ?></td>
                        </tr>
                        <?php }?>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Tax: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <?php 
                                
                                 echo  '<strong>'.$stotal.'</strong>'; ?>
                            </p>
                            <p>
                                <strong><?php echo $imp;?></strong>
                            </p></td>
                        </tr>
                        <tr>
                               <td></td>
                                <td colspan="2">
                            <?php
                            $desc=0;
                                if ($_POST['cupon']== "IPSUMLOREM"){
                                    echo '<h4>descuento 10%</h4>';
                                    
                                    $desc=.10;
                                }else if ($_POST['cupon']== "MUSPIMEROL"){
                                     echo '<h4>descuento 5%</h4>'; $desc=.5;
                                    
                                }else if ($_POST['cupon']== "IPSUMLOREM"){
                                     echo '<h4>descuento 15%</h4>'; $desc=.15;
                                    
                                }
                                if($desc==0){
                                    $total=$total;
                                }
                            else{
                                $d=$total*$desc;
                                $total=$total-$d;
                            }
                            ?>
                            </td>
                            </tr>
                        <tr>
                            
                            <td colspan="2">
                               <?php if($pago == 'OXXO'){ ?>
                                    <img src="temp/cuenta.png" alt="qr">
                                    <p>*Escanea para realizar el pago</p>
                                <?php }?>
                            </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            
                            <td class="text-center text-danger"><h4><strong>$ <?php echo $total;?></strong></h4></td>
                            
                        </tr>
                        
                    </tbody>
                </table>
                <div>
                    <h1 style="text-align:center;">
                        Gracias por tu compra, volveras...
                    </h1>
                    <a href="destroy.php" class="btn btn-success">Regresar al catalogo</a><br>
                    <form method="post" >
                    <br>
                  <input style="color: black" type="email" placeholder="Dirección de email" name="customer_email"  id="in-cpn" required><br>
                  <?php
                    if(isset($_POST['send']))
                    {
                        include("sendemail.php");
                        $mail_username = "corrientefluye@gmail.com";
                        $mail_userpassword = "WongHueleAPerro";
                        $mail_addAddress = $_POST['customer_email'];
                        $template = "email_templateRecibo.html";
                        
                        $randomNumber = rand(1,3);
                        $mail_setFromEmail = $_POST['customer_email'];
                        $mail_setFromName = "Gracias!";
                        $txt_message='
                        <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                       '; for($i = 0;$i<count($arreglo);$i++){$txt_message.='
                        <tr>
                            <td class="col-md-9">'.$arreglo[$i]["Nombre"].'</td>
                            <td class="col-md-1" style="text-align: center">'.$arreglo[$i]["Cantidad"].'</td>
                            <td class="col-md-1 text-center">'.$arreglo[$i]["Precio"].'</td>
                            <td class="col-md-1 text-center">'.($arreglo[$i]["Precio"]*$arreglo[$i]["Cantidad"]).'</td>
                        </tr>
                        ';}$txt_message.='
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Tax: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong>'.$stotal.'</strong>
                            </p>
                            <p>
                                <strong>'.$imp.'</strong>
                            </p></td>
                        </tr>
                        <tr>
                               <td></td>
                                <td colspan="2">
                            ';
                            $desc=0;
                                if ($_POST['cupon']== "IPSUMLOREM"){
                                    echo '<h4>descuento 10%</h4>';
                                    
                                    $desc=.10;
                                }else if ($_POST['cupon']== "MUSPIMEROL"){
                                     echo '<h4>descuento 5%</h4>'; $desc=.5;
                                    
                                }else if ($_POST['cupon']== "IPSUMLOREM"){
                                     echo '<h4>descuento 15%</h4>'; $desc=.15;
                                    
                                }
                                if($desc==0){
                                    $total=$total;
                                }
                            else{
                                $d=$total*$desc;
                                $total=$total-$d;
                            }
                            $txt_message.='
                            </td>
                            </tr>
                        <tr>
                            
                            <td colspan="2">
                               '; if($pago == 'OXXO'){$txt_message.='
                                    <img src="temp/cuenta.png" alt="qr">
                                    <p>*Escanea para realizar el pago</p>
                                '; }$txt_message.='
                            </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            
                            <td class="text-center text-danger"><h4><strong>$ '.$total.'</strong></h4></td>
                            
                        </tr>
                        
                    </tbody>
                </table>
                        ';                    //Informacion de compra
                        $mail_subject="Recibo de compra";
                        //Enviar el mensaje
                        //echo $txt_message;
                        sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);
                    }
                  ?>
                  <button name="send" type="submit" style="background-color: greenyellow" class="btn  shadow-lg btn-round text-light btn-lg btn-rised" id="btn-cpn">Enviar a mi correo</button>
              </form>
               <br><br>
                </div>
            </div>
        </div>
       </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
<!--Hasta aqui jeje-->