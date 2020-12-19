<?php 
session_start();
$_SESSION['carrito']= array(); $_SESSION['productos']=0;
header('Location: playeras.php');
?>