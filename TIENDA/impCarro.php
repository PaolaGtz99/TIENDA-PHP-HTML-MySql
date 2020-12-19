<?php
session_start();
error_reporting(0);
    include ('conexion.php');
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
        if(isset($_GET['id']) && $_GET['id'] != 0){
            $band = 0;
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <link rel="stylesheet" href="css/carrito.css">
      <link rel="icon" type="image/vnd.microsoft.icon" href="media/favicon.ico">
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-md-offset-1">
            <table class="table table-hover bg-white">
                <thead>
                    <tr style="font-family: 'Permanent Marker', cursive;">
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                    foreach ($_SESSION['carrito'] as list($cant, $idCarrito)){
                        if($idCarrito<200){
                            $sql = "SELECT * FROM playeras WHERE id= '$idCarrito'";  
                            $ext = 'PLAYERA';
                          
                        }else{
                             $sql = "SELECT * FROM sudaderas WHERE id= '$idCarrito'"; 
                            $ext = 'SUDADERA';
                        }
                        $resultado = $conexion -> query($sql); 
                         while( $fila = $resultado -> fetch_assoc()){
                        
                        echo '    
                    <tr style="font-family: Righteous, cursive;">
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                           
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src= "media/'.$ext.'/'.$fila['imagen'] .' " style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading" style="font-family: Permanent Marker, cursive; color: greenyellow; text-shadow: 1px 1px 2px black;"><b>'.$fila['nombre'].'</b></h4>
                                <h6 class="media-heading">'.$fila['descripcion'].'</h6>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="number" class="form-control" class="cantidad" value="'.$cant.'" onKeyPress="enterpressalert(event, this)">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$'.$fila['precio'].'</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$'.$fila['precio']*$cant.'</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remover
                        </button></td>
                    </tr>';
                             $total= $total + $fila['precio']*$cant;
                         }
                    }
                    ?>
                    
                    
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td> <?php
                        echo '<td class="text-right"><h5><strong>$'.$total.'</strong></h5></td>'; ?>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>$6.94</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        
                        <td class="text-right"><h3><strong>$31.53</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </div>
       
<script>
    
</script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 
</body>
</html>
