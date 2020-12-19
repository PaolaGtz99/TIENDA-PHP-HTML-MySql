<?php
   
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "prendas";

    $sql = new mysqli($server,$user,$pass,$db);

    if ($sql->connect_errno){
        die("Error en la conexion con la base de datos");
    }

    // En este punto, ya deberiamos estar conectados a la base
    // de datos y haber recibido el ID a buscar mediante AJAX

    $id = $_POST['id'];

if($id<200){
    $cadena = "SELECT * FROM playeras WHERE id=$id";
}else{
    $cadena = "SELECT * FROM sudaderas WHERE id=$id";
}


    $resultado = $sql->query($cadena);

    // Si la consulta genero registros, significa que si lo encontro
    if ($resultado -> num_rows){
        // Regresamos los datos que encontramos
        $fila = $resultado->fetch_assoc();
 $var1= 'nombre: '.$fila['nombre'].'&#10 &#10descripcion:'.$fila['descripcion'].'&#10 &#10precio: '.$fila['precio'].'&#10&#10existencia: '.$fila['existencia'];
        
if($id<200){
   $var2= 'media/PLAYERA/'.$fila['imagen'];
}else{
   $var2= 'media/SUDADERA/'.$fila['imagen'];
}
 
        
       $cadena = array($var1,$var2) ;
        echo json_encode($cadena);
    } else {
        // Mandamos un false, que sera procesado del lado del cliente
        // el cual significara que no lo encontro
    echo json_encode("FALSE");
    }    
?>