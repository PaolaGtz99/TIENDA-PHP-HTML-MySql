<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
  <a href="carrito.php">Carrito</a>
   <?php 
        include ('conexion.php');
        $con=conectar();
        echo "si se conecto jeje";
        $re = mysqli_query($con,"select * from productos") or die(mysql_error());
        while ($f = mysqli_fetch_array($re)){        
    ?>
    <div>
        <h1><?php echo $f['nombre'];?></h1><br>
        <h3><?php echo '$'.$f['precio']?></h3>
        <h6><?php echo $f['existencia']?> disponibles</h6>
        <a href="carrito.php?id=<?php echo $f['id'];?>" onclick="">agregar al carrito</a>    
    </div>
  <?php }
    mysqli_close($con);
    ?>
</body>
</html>