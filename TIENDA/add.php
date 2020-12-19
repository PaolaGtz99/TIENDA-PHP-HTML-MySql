<?php

session_start();

  

$idAdd = $_POST['id'];


$encuentra = 0; //para saber si el producto ya esta ahi  
$carrito = $_SESSION['carrito']; //pasamos a carrito el arreglo
 $i=0;
foreach ($carrito as list($cant, $idCarrito)){
    
    
        if($idCarrito==$idAdd){
        $carrito[$i][0]= $cant + 1; //suma la cantidad de producto que ya estaba en el carrito
            $encuentra = 1;
            
        
            }
   $i = $i + 1;
        }
if($encuentra==0){
    $carrito[] = array(1,$idAdd); //añade nuevo producto al carrito
}

$_SESSION['productos'] = $_SESSION['productos'] + 1;
$_SESSION['c']=$_SESSION['c']+1;
 $_SESSION['carrito'] = $carrito;
    }

?>


