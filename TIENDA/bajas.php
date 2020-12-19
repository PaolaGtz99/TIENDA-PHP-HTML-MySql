<?php
   
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='prendas';
     
    //conexion a la base de datos
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
         die('Error en la conexion');
        
        
    }
$eliminar = $_POST['id'];

if($eliminar<200){
  $sql =  "DELETE FROM playeras WHERE id='$eliminar'";  
}else{
  $sql =  "DELETE FROM sudaderas WHERE id='$eliminar'";  
}               
$conexion->query($sql);

?>