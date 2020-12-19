<?php
    session_start();
    $arreglo = $_SESSION['carrito'];
    $j=0;
    include ('conexion.php');
    $con = conectar();
    $dat = mysqli_query($con,"select * from compras") or die("Error");

    while($ax = mysqli_fetch_array($dat)){
        $j++;
    }
    
    $nom_cl = $_POST['name'];
    $mail_cl = $_POST['mail'];
    $tel_cl = $_POST['cell'];
    $dir_cl = $_POST['dir'];
    $cp_cl = $_POST['cp'];
    $ciudad_cl = $_POST['cy'];
    $pais_cl = $_POST['pais'];
    
    mysqli_query($con,"INSERT INTO `clientes`(`no_vta`, `nombre`, `correo`, `telefono`, `dirección`, `cp`, `ciudad`, `pais`) VALUES ($j,'$nom_cl','$mail_cl','$tel_cl','$dir_cl','$cp_cl','$ciudad_cl','$pais_cl')") or die(mysqli_error($con));

//    Con este for inserto los datos del carrito a una tabla llamada compras
    echo "Procesando...";
    for($i = 0;$i < count($arreglo);$i++){
        $id = $arreglo[$i]['Id'];
        $nombre = $arreglo[$i]['Nombre'];
        $subt = $arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'];
        $can = $arreglo[$i]['Cantidad'];
        $ex = $arreglo[$i]['Existencia'];
        $img = $arreglo[$i]['Imagen'];
        mysqli_query($con,"INSERT INTO `compras`(`no_venta`,`id_p`, `nombre_p`, `subtotal_p`, `cantidad_p`, `imagen_p`) VALUES ($j,'$id','$nombre','$subt','$can','$img');") or die(mysqli_error($con));
        mysqli_query($con,"UPDATE `productos` SET `existencia`= $ex-1 WHERE `id`= '$id'") or die(mysqli_error($con));   
    }
?>   