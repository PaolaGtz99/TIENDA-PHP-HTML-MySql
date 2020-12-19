<?php
    session_start();
    if(isset($_GET['variable'])){
        if($_GET['variable']!=-1){
            echo $_GET['variable']." <br>";
            $ax = array_pop($_SESSION['carrito']);
            $temp=array();
            $var=1;
            echo $ax['Id']." ".$_GET['variable']."<br>";
            //--------son iguales
            while($ax['Id']!=$_GET['variable']){
                array_push($temp,$ax);
                $ax = array_pop($_SESSION['carrito']);
                echo $var;
                $var=$var+1;
            }
            while(!empty($temp)){
                array_push($_SESSION['carrito'],array_pop($temp));
            }
        }
            if(empty($_SESSION['carrito']))
                header('Location:carrito.php?id=0');
            else
                header('Location:carrito.php?id=-1');
    }
?>