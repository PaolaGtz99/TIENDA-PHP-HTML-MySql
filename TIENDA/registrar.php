<?php
session_start();
if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['cuenta']) && isset($_POST['contrasena'])){
     $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='prendas';
	
	 $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
        die('Error en la conexion');
    }
    //FIN DE CONEXION
	
    $sql="SELECT * FROM usuarios WHERE Cuenta='".$_POST['cuenta']."'";
    $resultado=$conexion->query($sql);
    
    if($resultado->num_rows){
        $_SESSION['status']=4;
        header('Location: index.php');
    }else{
    $hash=password_hash($_POST['contrasena'],PASSWORD_DEFAULT,[11]);
	
    $sql="INSERT INTO usuarios(Nombre, Correo, Cuenta, contra, bloqueada) VALUES ('".$_POST['nombre']."','".$_POST['correo']."','".$_POST['cuenta']."','".$hash."','3')";
    $resultado=$conexion->query($sql);
        
        $sql="INSERT INTO chatapp.".$_POST['cuenta']."(id, nombre, mensaje, fecha) VALUES ('".$_POST['nombre']."','".$_POST['correo']."','".$_POST['cuenta']."','".$hash."','3')";
    $resultado=$conexion->query($sql);
    $_SESSION['status']=5;
   header('Location: login.php');
    }
}
?>