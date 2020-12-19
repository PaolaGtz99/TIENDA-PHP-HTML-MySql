<?php
    function conectar(){
        $server = "localhost";
        $username = "root";
        $pass = "";
        $db = "Carrito";
        $con = mysqli_connect($server,$username,$pass,$db) or die("Error al iniciar conectar!!!");
//        mysqli_select_db() or die("No esiste la DB!!!");
        return $con;
    }
    function quitar(){
        echo "<h2 style='color: red'>quitando...</h2>";
        
    }
?>