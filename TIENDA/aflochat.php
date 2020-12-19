<?php
include "db.php";
# Iniciar sesión para usar $_SESSION

session_start();


if (empty($_SESSION["user"])) {
    # Lo redireccionamos al formulario de inicio de sesión
    header("Location: index.php");
    # Y salimos del script
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet">
	<script src="https://kit.fontawesome.com/43d3fcf7eb.js" crossorigin="anonymous"></script>
    <title>Document</title>
    
    <style>
/* Button used to open the chat form - fixed at the bottom of the page */
a
{
    text-decoration:none;
}
        
#contenedor{
	width: 40%;
	background: #fff;
	margin: 0 auto;
	padding: 20px;
	border-radius: 12px;
	-moz-border-radius: 12px;
	-o-border-radius: 12px;
	-webkit-border-radius: 12px;
}

#caja-chat{
	width: 90%;
	height: 300px;
}

#datos-chat{
	width: 100%;
	padding: 5px;
    border-radius: 5px;
	margin-bottom: 5px;
	border-bottom: 1px solid silver;
	font-weight: bold;
	font-family: 'Mukta Vaani', sans-serif;
}

input[type='text']{
	width: 100%;
	height: 40px;
	border: 1px solid gray;
	border-radius: 5px;
}

input[type='submit']{
	width: 100%;
	height: 40px;
	border: 1px solid gray;
	border-radius: 5px;
	cursor: pointer;
}

textarea{
	width: 100%;
	height: 40px;
	border: 1px solid gray;
	border-radius: 5px;
}

input, textarea{
	margin-bottom: 3px;
}

.open-button {
  background-color: cornflowerblue;
  color: white;
  padding: 16px 20px;
  border-radius: 50px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 15px;
  left: 10px;
  width: 70px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: -10px;
  left: 0px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 2px 0 2px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 60px;
}
        
.form-container input {
  width: 100%;
  padding: 15px;
  margin: 2px 0 2px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 20px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  border-radius: 10px;
  color: white;
  padding: 4px 4px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:3px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
        body{
            background-image: url(media/fondo2.jpg);
        }
/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
        .men li .subm {
				display:none;
				position:absolute;
				min-width:140px;
            background: black;
			}
        .men li .subm li:hover {
				
            background: greenyellow;
			}
        
			
			.men li:hover > .subm {
				display:block;
                
			}
			
			.men li .subm li {
				position:relative;
			}
			
			.men li .subm li .subm {
				right:-140px;
				top:0px;
			}



.content {
      width: 94%;
      margin: 4em auto;
      font-size: 20px;
      line-height: 30px;
      text-align: justify;
}

.logo {
      line-height: 60px;
      position: fixed;
      float: left;
      margin: 16px 46px;
      color: #fff;
      font-weight: bold;
      font-size: 20px;
      letter-spacing: 2px;
}

nav {
      position: fixed;
      width: 100%;
      line-height: 60px;
    z-index: 2;
}

nav .men {
      line-height: 60px;
      list-style: none;
      background: black;
      overflow: hidden;
      color: #fff;
      padding: 0;
      text-align: right;
      margin: 0;
      padding-right: 40px;
      transition: 1s;
}

nav.black .men {
      background: #000;
}

nav .men li {
      display: inline-block;
      padding: 16px 20px;;
}


nav .men li a {
      text-decoration: none;
      color: #fff;
      font-size: 16px;
}

.menu-icon {
      line-height: 60px;
      width: 100%;
      background: #000;
      text-align: right;
      box-sizing: border-box;
      padding: 15px 24px;
      cursor: pointer;
      color: #fff;
      display: none;
}

@media(max-width: 786px) {

      .logo {
            position: fixed;
            top: 0;
            margin-top: 16px;
      }

      nav .men {
            max-height: 0px;
            background: #000;
      }

      nav.black .men {
            background: #000;
      }

      .showing {
            max-height: 34em;
      }

      nav .men li {
            box-sizing: border-box;
            width: 100%;
            padding: 24px;
            text-align: center;
      }

      .menu-icon {
            display: block;
      }

}
    </style>
</head>
<body>
 
 
<!--  --------------------------------------- M E N U --------------------------------------------------------------- --> 
  
    <script>
    $(document).ready(function(){
    //Handles menu drop down
    $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
    });
});
    </script>    
    <div class="wrapper">
         <header style="font-family: 'Permanent Marker', cursive;" id="acc" >
            
              <nav id="nav">
               
                  
              
               <div class="logo">
                  
               <img src="media/blacklogo.png" width="60px" alt=""> <span style="color: white">CORRIENTE </span>
               <span style="color: greenyellow; font-family: 'Righteous', cursive;  ">"Todo Fluye"</span>
               
               </div>
               <div class="menu-icon">
                  <i class="fa fa-bars fa-2x"></i>
               </div>
               <div class="menu">
                  <ul class="men">
                     <li id="li"><a class="m active" href="index.php" ><span class="acc">Inicio</span></a></li>
                     <li><a class="m" href="#">Tienda  <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                     <ul class="subm" >
                         <li style="padding: 7px;" class="sub"><a href="playeras.php">Playeras <i class="fa fa-male" aria-hidden="true"></i></a></li>
                         <li style="padding: 4px; border-left: 2px solid white;" class="sub"><a href="sudaderas.php">Sudaderas <i class="fa fa-female" aria-hidden="true"></i></a></li>
                     </ul></li>
                     <li><a class="m" href="acerca.php">Acerca de</a></li>
                     <li><a class="m" href="contacto.php">Contactanos</a></li>
                     <li><a  class="m" href="ayuda.php">Ayuda</a></li>
                     <?php 
					  if(!empty($_SESSION["user"])){ ?>
           					<li class="m"><?php 
                        	echo $_SESSION['name'];
                    		?><ul class="subm">
                    			<li style="padding: 6px; " class="sub">
                    			<a href="logOut.php"  id="btn-cpn" >Logout</a>
                    			</li>      
                        <?php
                          if($_SESSION["user"]== "Administrador")
                            echo '<li style="padding: 6px; border-left: 2px solid white;" class="sub"><a href="modificar.php"  id="btn-cpn" >Ajustes</a></li>';
                          
                          ?>
                                
                    			</ul></li>
            				<?php	
                		}else
            			{?>
                     		<li><a href="login.php" class="m2"><i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i></a></li>
                     		<?php 
					  	} ?>
                     
                        <a onclick="muestra()" ><i class="fa fa-low-vision fa-2x" aria-hidden="true" style="background-color:black"></i></a>
                        <div style="display:none;" id="mostrar">
                        <a onclick="zoomIn()" style="background-color:black">+</a>&nbsp;&nbsp;
                        <a onclick="zoomOut()" style="background-color:black">-</a>&nbsp;&nbsp;
                        <a type="text" onclick="rojo()" style="background-color:black">azul</a>&nbsp;
                        <a type="text" onclick="negro()" style="background-color:black">verde</a>&nbsp;
                        <a type="text" onclick="blanco()" style="background-color:black">blanco</a>&nbsp;
                        </div>
        
	                    <script src="java.js"></script>
               
 
                     
                  </ul>
                
                  
                  
                  
                  
               </div>
                 
 
                </nav> 
            
            
            <script>
                
             $(document).ready(function(){
    //Handles menu drop down
    $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
    });
});</script>
<br><br><br><br><br>
<main class="container">
        <div class="row">
           <div class="col-12 col-sm-5 col-md-3 col-lg-2">
                <h2>Chats Pendientes</h2>
                <a href="chatchat.php">chat</a><br>
                <a href="osalchat.php">osalas</a><br>
                <a href="#">aflores</a><br>
                 <a href="pgutchat.php">pgutierrez</a><br>
            </div>
            <div class="col-12 col-sm-1 col-md-2 col-lg-2"></div>
            <div class="col-12 col-sm-6 col-md-7 col-lg-8">
                <h2>Contenido del Chat</h2>

               <form class="form-container" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"?>
                    <div id="caja-chat">
                        <div id="chat"></div>
                    </div>
                    <textarea name="mensaje" placeholder="¡Dinos algo!" required></textarea>
                    <button type="submit" name="enviar" value="Enviar" class="btn">Enviar</button>
                </form>
            </div>
        </div>
    </main>

<!--
<button class="open-button" onclick="openForm()" style="font-size:20px"><i class="far fa-comments"></i></button>
	<div id="contenedor">
        <div class="chat-popup" id="myForm">
		<form class="form-container" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"?>
		<div id="caja-chat">
			<div id="chat"></div>
		</div>
			<textarea name="mensaje" placeholder="¡Dinos algo!" required></textarea>
			<button type="submit" name="enviar" value="Enviar" class="btn">Send</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
		</form>
        </div>

		<?php
			if (isset($_POST['enviar'])) {
				
				$nombre = "aflores"; 
                    $admin = $_SESSION["user"];
				$mensaje = $_POST['mensaje'];
                        //Metemos el mensaje a la tabla del usuario
                        $consulta = "INSERT INTO `$nombre` (`nombre`, `mensaje`) VALUES ('$admin', '$mensaje');";
                        $conexion->query($consulta);
			}
		?>
	</div>
-->
<script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest();

			req.onreadystatechange = function(){
				if (req.readyState == 4 && req.status == 200) {
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}
			req.open('GET', 'getchat.php?client=aflores', true);
			req.send();
		}

		//linea que hace que se refreseque la pagina cada segundo
		setInterval(function(){ajax();}, 1000);
    
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
 


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</body>
</html>