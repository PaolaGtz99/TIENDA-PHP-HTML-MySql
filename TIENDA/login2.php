<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" >    
        function carga(){
            var contador_m = 0;
            window.setInterval(
                function(){
                    contador_m++;
                }
                ,1000)
            if (contador_m==10){
                document.getElementById("cajon").value=contador_m;
            }
        }
        function bien(){
            swal("Bienvenido", "Datos introducidos correctos", "success");
        }
        function error(){
            swal("Error", "Contraseña incorrecta", "error");
        }
		function errorFinal(){
            swal("Error", "Tu cuenta sera bloqueada por fallar 3 intentos", "error");
        }
        function wtf(){
            swal("?", "Algo no esta bien, puede que el usuario no exista", "warning");
        }
		function obama(){
            swal("¿WTF?", "Estas bloqueado menso/mensa, solicita recuperar contraseña para desbloquear", "error");
        }
    
    </script>
</head>
<body>
    <input type="hidden" type="hidden" id="cajon" value="">
</body>
</html>
   <?php
    # Las claves de acceso disponibles
    session_start();
	
    /* AQUÍ HACES LA COMPROBACIÓN */
    /* FIN COMPROBACIÓN INTENTOS */

    //CONEXION CON BD
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='prendas';
    $nombre=$_POST["usuario"];
    $contra=$_POST["palabra_secreta"];
    $contador=-1;
            
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
        die('Error en la conexion');
    }
    //FIN DE CONEXION

    $sql = "SELECT * FROM usuarios WHERE cuenta='$nombre'" ;
    
    $resultado=$conexion->query($sql); //aplicamos sentencia   
    $resultado2=$conexion->query($sql); //aplicamos sentencia   
     
    if (($resultado->num_rows) > 0) {
        while( $fila = $resultado -> fetch_assoc() ){  //recorremos los registro hasta encontrar usuario deseado
            $contador++;
        }
    }else{
        echo "no hay resultados";
    }

    $resultado2->data_seek($contador);
    $row1 = $resultado2->fetch_assoc();
    if($row1['cuenta'] == $nombre){
			
        if((password_verify($contra,$row1['contra'])) && ($row1['bloqueada'] > 0)){           //Valida que la contraseña este correcta y que no este bloqueado el usuario
                
            
			
			$conexion2 = new mysqli($servidor,$cuenta,$password,$bd);
					$sql2 ="UPDATE usuarios SET bloqueada=3 WHERE cuenta='$nombre'" ;
					if ($conexion2->query($sql2) === TRUE) {
                        //echo "Record updated successfully";
                    }else{
                            echo "Error updating record: " . $conexion2->error;
                    }
			
            # Luego redireccionamos a la pagina "Secreta"
            $_SESSION['logueado'] = true;
            $_SESSION['user'] = $nombre;
            $_SESSION['name'] = $row1['nombre'];
             
            //recordar contraseña y usuario
            if(!empty($_POST["remember"])){
				setcookie ("usuario",$_POST["usuario"],time()+ 3600);
    			setcookie ("palabra_secreta",$_POST["palabra_secreta"],time()+ 3600);
                
                //echo "Cookies Set Successfuly";
            }else{
                 setcookie("usuario","");
                setcookie("palabra_secreta","");
                //echo "Cookies Not Set asdfghjklñaekdkdkdlkdlkdflkdflkdkkfklfkfk59fk9fd5lkf9lk5f9k4kf9k458f9k4fkf79k48fkff";
            }
                
				echo "<script>";
				echo "bien();";
                echo "setTimeout(() => {window.location.href = 'index.php';},1500);";
                echo "</script>";
            //header ('location: index.php'); 
            }else if((!password_verify($contra,$row1['contra']) && ($row1['bloqueada'] > 0))){
                $row1['bloqueada'] -= 1;
                if ($row1['bloqueada'] == 0) { 
                //Si existe "intentos" y ya se resto 3 veces comprobaciones devolvemos el mensaje de error. Esta comprobación la hacemos aquí arriba porque si ya ha hecho 3 intentos ni siquiera hay que conectar a la BD
					
                    echo "<script>";
                	echo "errorFinal();";
                	echo "</script>";
                    $conexion2 = new mysqli($servidor,$cuenta,$password,$bd);
                    if ($conexion2->connect_errno){
                        die('Error en la conexion');
                    }
                    
                    $sql2 ="UPDATE `usuarios` SET `bloqueada`=0 WHERE `cuenta`='$nombre'" ;
                    
                    if ($conexion2->query($sql2) === TRUE) {
                        //echo "Record updated successfully";
                    }else{
                            echo "Error updating record: " . $conexion2->error;
                    }
                    require "login.php";
                
				}else{
					$conexion2 = new mysqli($servidor,$cuenta,$password,$bd);
					$sql2 ="UPDATE `usuarios` SET `bloqueada`='".$row1['bloqueada']."' WHERE `cuenta`='".$nombre."'" ;
					if ($conexion2->query($sql2) === TRUE) {
                        //echo "Record updated successfully";
                    }else{
                            echo "Error updating record: " . $conexion2->error;
                    }
					echo "<script>";
                	echo "error();";
                	echo "</script>";
					//echo $row1['bloqueada'];
					//echo $sql2;
					require "login.php";
                   // header ('location: login.php');
				}
            
            }else if($row1['bloqueada'] == 0){
            		
                    echo "<script>";
            
                    echo "obama();";
                    echo "</script>";
                    echo '<br>';
            require "login.php";
            }else{
            
            echo "<script>";
                    echo "wtf();";
                    echo "</script>";
           require "login.php";
		}
        }else{
        
            echo "<script>";
        
        
                    echo "wtf();";
                    echo "</script>";
            echo '<br>';
        require "login.php";
        }  


?> 
