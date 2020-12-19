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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <link rel="stylesheet" href="css/carrito.css">
    <link rel="stylesheet" href="paocss.css" type="text/css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link rel="icon" type="image/vnd.microsoft.icon" href="media/favicon.ico">
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
  <div class="col-sm-12 col-md-12 col-md-offset-1">
        <table class="table table-hover bg-white">
                   
        <?php
            $total = 0;
            if(isset($_SESSION['carrito']) && $band == 0){
                $datos = $_SESSION['carrito'];
                ?>
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
                $cant_pr=0;
                for($i = 0;$i<count($datos);$i++){
                    $cant_pr +=  $datos[$i]['Cantidad'];
                    if($datos[$i]['Cantidad'] != 0 && $datos[$i]['Id'] != 0){
                        if($datos[$i]['Id']<200){
                            $dir = "/PLAYERA";
                        }else{
                            $dir = "/SUDADERA";
                        }
        ?>
        <tr style="font-family: Righteous, cursive;">
                        <td class="col-sm-8 col-md-6">
                            <div class="producto media">
                               <?php
                                echo '<h1><img width="100px" src="media'.$dir.'/'.$datos[$i]["Imagen"].'" >'.$datos[$i]["Nombre"].'</h1>';
                                    
                                    ?>
                            </div>
                        </td>
                        <td class="col-sm-1 col-md-1">
                            <h3><input type="number" value="<?php echo $datos[$i]['Cantidad']; ?>" max="<?php echo $datos[$i]['Existencia']; ?>" min="1"
                                                data-precio="<?php echo $datos[$i]['Precio']; ?>"
                                                data-id="<?php echo $datos[$i]['Id']; ?>"
                                                class="cantidad"></h3>                            
                        </td>
                        <td class="col-sm-1 col-md-1">
                            <h3><?php echo '$'.$datos[$i]['Precio'];?></h3>
                        </td>
<!--                                <h3 class="subt">Subtotal: <?php echo '$'.$datos[$i]['Precio']*$datos[$i]['Cantidad'];$total+=$datos[$i]['Precio']*$datos[$i]['Cantidad'];?></h3>-->
                <td>
                    <h3 id="st<?php echo $datos[$i]['Id']?>"><?php echo '$'.$datos[$i]['Precio']*$datos[$i]['Cantidad'];?></h3>
                </td>
                <td>
                   <a href="temporal.php?variable=<?php echo $datos[$i]['Id']; ?>" onclick="" class="btn btn-danger">Quitar</a> 
               </td>                                 
                </tr>
                            <?php   }     
                }
                $_SESSION['productos']=$cant_pr;               
                ?>
                <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total: $</h3></td>
                        
                        <td class="text-right" colspan="2"><h3 id="total"><?php echo $total;?></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                            <a href="playeras.php" class="btn btn-default" style="background-color: gray; color: #fff;">Seguir comprando...</a>
                        </td>
                        <td>
                            <a href='paola.php' class='btn btn-success'>Comprar</a>  
                        </td>
                    </tr>
                </tbody>
                <?php                        
                }else{
                    echo '<h1>Vacio!!!</h1>';
                    echo '<a href="playeras.php" class="btn btn-default" style="background-color: gray; color: #fff;">Seguir comprando...</a>';
                }
                ?>
                
      </table>
    </div>
    <script>
        var id = <?php echo $_GET['id'];?>;
        if(id!=-1){
            window.close();
        }
    </script>
</body>
</html>