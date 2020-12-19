<?php
    session_start();
    error_reporting(0);
    include ('conexion.php');
    if(isset($_SESSION['carrito'])){
        $arreglo = $_SESSION['carrito'];
        $sw = false;
        $num = 0;
        for($i=0;$i<count($arreglo);$i++){
            if($arreglo[$i]['Id'] == $_GET['id']){
                $sw = true;
                $num = $i;
            }            
        }
        if($sw == true){
                $arreglo[$num]['Cantidad'] = $arreglo[$num]['Cantidad']+1;
                $_SESSION['carrito'] = $arreglo;
        }else{
            $con = conectar();
            $re = mysqli_query($con,"select * from productos where id=".$_GET['id']) or die("error");
            while($f=mysqli_fetch_array($re)){
                $nombre = $f['nombre'];
                $precio = $f['precio'];
                $imagen = $f['imagen'];
                $ex = $f['existencia'];
            }
            $news = array('Id' => $_GET['id'],
                              'Nombre' => $nombre,
                              'Precio' => $precio,
                              'Imagen' => $imagen, 
                              'Existencia' => $ex,
                              'Cantidad' => 1);
            array_push($arreglo,$news);
            $_SESSION['carrito'] = $arreglo;
        }
        
    }else{ 
        if(isset($_GET['id'])){
        $con = conectar();
        $re = mysqli_query($con,"select * from productos where id=".$_GET['id']);
        while($f=mysqli_fetch_array($re)){
            $nombre = $f['nombre'];
            $precio = $f['precio'];
            $imagen = $f['imagen'];
            $ex = $f['existencia'];
        }
        $arreglo[] = array('Id' => $_GET['id'],
                          'Nombre' => $nombre,
                          'Precio' => $precio,
                          'Imagen' => $imagen,
                          'Existencia' => $ex,
                          'Cantidad' => 1);
        $_SESSION['carrito'] = $arreglo;
    }}
//function clear(){
//    session_abort();
//}
    function comprar(){
        echo "<h1>Jeje</h1>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
</head>
<body>
       <a href="" onclick="">Limpiar Carrito</a>
        <?php
            $total = 0;
            if(isset($_SESSION['carrito'])){
                $datos = $_SESSION['carrito'];
                
                for($i = 0;$i<count($datos);$i++){
                    if($datos[$i]['Cantidad'] != 0){
        ?>
        <div class="producto">
            <h1>Nombre: <?php echo $datos[$i]['Nombre'];?></h1>
            <h3>Precio: <?php echo '$'.$datos[$i]['Precio'];?></h3>
            <h3>Cantidad: <input type="number" value="<?php echo $datos[$i]['Cantidad']; ?>" max="<?php echo $datos[$i]['Existencia']; ?>" min="1"
                            data-precio="<?php echo $datos[$i]['Precio']; ?>"
                            data-id="<?php echo $datos[$i]['Id']; ?>"
                            class="cantidad"></h3>
            <h3 class="subt">Subtotal: <?php echo '$'.$datos[$i]['Precio']*$datos[$i]['Cantidad'];$total+=$datos[$i]['Precio']*$datos[$i]['Cantidad'];?></h3>
            <a href="" onclick="<?php echo"<h1>jep</h1>"?>">Quitar</a>  
        </div>
        <?php   }
                }
            echo "<h3 id='total'>Total: $total</h3>";
            echo "<a href='compras.php'>Comprar</a>";
            }else{
                echo '<h1>Vacio!!!</h1>';
            }
        ?>
</body>
</html>