<?php
session_start();
include "db.php";

$drop = $conexion->query('DROP TABLE '.$_SESSION['user']);
session_destroy();
header("Location: index.php");	


?>
