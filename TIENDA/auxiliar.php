<?php
    session_start();
    error_reporting(0);
    include ('conexion.php');
    //$dir='/PLAYERA';
    if(isset($_SESSION['carrito']) && $_GET['id'] != 0){
        $arreglo = $_SESSION['carrito'];
        $sw = false;
        $num = 0;
        for($i=0;$i<count($arreglo);$i++){
            if($arreglo[$i]['Id'] == $_GET['id']){
                $sw = true;
                $num = $i;
            }            
        }
        if($sw == true && $_GET['id']!=-1){
                $arreglo[$num]['Cantidad'] = $arreglo[$num]['Cantidad']+1;
                $_SESSION['carrito'] = $arreglo;
        }else if($_GET['id']!=-1){
            $con = conectar();$sql='';
            if($_GET['id']<200){
                $sql="SELECT * FROM playeras WHERE id=";
                $dir='/PLAYERA';
            }
            else{
                $sql="SELECT * FROM sudaderas WHERE id=";
                $dir='/SUDADERA';
            }
            $re = mysqli_query($con,$sql.$_GET['id']) or die("error");
            while($f=mysqli_fetch_array($re)){
                $nombre = $f['nombre'];
                $desc = $f['descripcion'];
                $precio = $f['precio'];
                $imagen = $f['imagen'];
                $ex = $f['existencia'];
            }
            $news = array('Id' => $_GET['id'],
                              'Nombre' => $nombre,
                              'Desc' => $desc,
                              'Precio' => $precio,
                              'Imagen' => $imagen, 
                              'Existencia' => $ex,
                              'Cantidad' => 1);
            array_push($arreglo,$news);
            $_SESSION['carrito'] = $arreglo;
        }
    }else{ 
        if(isset($_GET['id']) && $_GET['id'] != 0){
            $band = 0;
        $con = conectar();
        $dir='';
        if($_GET['id']<200){
            $sql="SELECT * FROM playeras WHERE id=";
            $dir='/PLAYERA';
        }
        else{
            $sql="SELECT * FROM sudaderas WHERE id=";
            $dir='/SUDADERA';
        }
        $re = mysqli_query($con,$sql.$_GET['id']) or die("error");
        while($f=mysqli_fetch_array($re)){
            $nombre = $f['nombre'];
            $desc = $f['descripcion'];
            $precio = $f['precio'];
            $imagen = $f['imagen'];
            $ex = $f['existencia'];
        }
        $arreglo[] = array('Id' => $_GET['id'],
                          'Nombre' => $nombre,
                          'Desc' => $desc,
                          'Precio' => $precio,
                          'Imagen' => $imagen,
                          'Existencia' => $ex,
                          'Cantidad' => 1);
        $_SESSION['carrito'] = $arreglo;
        }else{
            $band = 1;
        }
    }
//function clear(){
//    session_abort();
//}
    function comprar(){
        echo "<h1>Jeje</h1>";
    }
?>
