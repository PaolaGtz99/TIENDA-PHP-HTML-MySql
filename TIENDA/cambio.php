<?php
   
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "prendas";

    $sql = new mysqli($server,$user,$pass,$db);

    if ($sql->connect_errno){
        die("Error en la conexion con la base de datos");
    }


$id= $_POST['id'];
$nom= $_POST['nom'];
$pre= $_POST['pre'];
$des= $_POST['descrip'];
$ex= $_POST['exist']; 
$img = $_POST['img'];
$band = $_POST['b'];


if($id<200){
    if($band == 0){
       $q = "UPDATE playeras SET nombre ='$nom', descripcion ='$des', precio ='$pre', existencia ='$ex' WHERE id=$id"; 
    }
    else{
        $q = "UPDATE playeras SET nombre ='$nom', descripcion ='$des', precio ='$pre', existencia ='$ex', imagen ='$img' WHERE id=$id";
       
    }
   
}else{
     if($band == 0){
    $q = "UPDATE sudaderas SET nombre ='$nom', descripcion ='$des', precio ='$pre', existencia ='$ex' WHERE id=$id";}
    else{
        $q = "UPDATE sudaderas SET nombre ='$nom', descripcion ='$des', precio ='$pre', existencia ='$ex', imagen ='$img' WHERE id=$id";
    }
}
  
   mysqli_query($sql, $q);

?>