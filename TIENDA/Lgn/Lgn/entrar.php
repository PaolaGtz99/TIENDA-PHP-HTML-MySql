<?php
    session_start();
    $_SESSION['user']=$_POST['usuario'];
    header('Location: accesibilidad.php');
?>