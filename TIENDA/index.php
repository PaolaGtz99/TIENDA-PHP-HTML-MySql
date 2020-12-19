<?php
include ('conexion.php');
include('db.php');
if(!isset($_SESSION))
session_start();
/*

*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Corriente</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <link rel="icon" type="image/vnd.microsoft.icon" href="media/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/orig.css">
    <link href="https://fonts.googleapis.com/css?family=Patrick+Hand|Permanent+Marker|Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @font-face {
          font-family: "Contador";
          src: url("contador.ttf");
        }
        #contador{
            font-family: "Contador";
            font-size: 150%;
            
        }
        .cnt{
            text-align: center;   
        }
        #cupones{
            padding: 5px;
        }
        #in-cpn,#btn-cpn{
           margin: 1px;
            width: 100%;
            text-align: center;
        }
        .text-white{
            color: white;
        }
        
        a:hover{
            color: white;
        }
        
        .active {
  font-size: 30px;
            
}
        .m2:hover{
            color: greenyellow;
        }

    </style>
  <script src="https://use.fontawesome.com/d9cd240a9e.js"></script>    
  
  
     <!--  --------------------------------- E S T I L O S  C H A T ------------------------------------------------- --> 

    <style>
/* Button used to open the chat form - fixed at the bottom of the page */
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
  background-color: cornflowerblue;
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
  background-color: crimson;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
    </style>  
    
 </head>
<body onload="user()">
   
 
  <!--  --------------------------------------- M E N U --------------------------------------------------------------- --> 
<?php
    echo "<p id='user' style='display:none'>";
if(isset($_SESSION['user']))
    echo $_SESSION['user'];
else 
    echo "nadie";
echo "</p>";
  ?>
   
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
           
            
            <!-- ------------------------------------------------------------------ H E A D E R ------------------------------------------ -->
<section class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark" style="height:100vh; background-size: cover; background-image: url(media/headPrueb.jpg);" id="fnd1">
  
   <div class="container-fluid">
      <div class="row  justify-content-center align-items-center d-flex text-center h-100">
        <div class="col-12 col-md-8  h-50 ">
            <h1 class="display-2  text-light mb-2 mt-5"><strong>CORRIENTE</strong> </h1>
            <p class="lead  text-light mb-5" style="font-family: 'Righteous', cursive; ">Encuentra el mejor catálogo al mejor precio y con la calidad Corriente.</p>
<p><a href="playeras.php" class="btn bg-danger shadow-lg btn-round text-light btn-lg btn-rised">COMPRA AHORA ></a></p>
					
					<div class="btn-container-wrapper p-relative d-block  zindex-1">
						<a class="btn btn-link btn-lg   mt-md-3 mb-4 scroll align-self-center text-light" href="http://bootstraptor.com">
						    <i class="fa fa-angle-down fa-4x text-light"></i>
						    </a>   
					</div>   
        </div>
		 
      </div>
    </div>
    </section>


         </header>
         
      </div>
      
      <script>
       $(document).ready(function() {
            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
      });

      // Scrolling Effect

      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('black');
            }

            else {
                  $('nav').removeClass('black');
            }
      })
          </script>
   <br><br><br><hr><br><br><br>
<!-- --------------------------------------------- D E S C U E N T O S ----------------------------------------------------------------- -->     
      <div class="row  justify-content-center align-items-center d-flex text-center h-100">  
          <div class="knockout"><a  rel="">OFERTAS</a></div>  </div>
         
 <section class="section">
  <div class="container" style="font-family: 'Righteous', cursive; ">

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="media/cup1.jpg" alt="">
          
        </div>
        <div class="item">
          <img src="media/head1.jpg" alt="">
          <div class="carousel-caption">
            <h2>Subscribete</h2>
            <p>para obtener nuestros mejores cupones</p>
          </div>
        </div>
        <div class="item">
          <img src="media/carousel3.jpg" alt="...">
          <div class="carousel-caption">
            <h2>Contactanos</h2>
            <p>Y recibe 20% de descuento en toda la tienda</p>
          </div>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>

  </div>
</section>
          
  <!-- --------------------------------------------- I N S T A ----------------------------------------------------------------- -->
<br><br><br><br><hr><br><br><br><br>

<div class="row  justify-content-center align-items-center ">
    <figure class="snip1401">
  <img src="media/insta.jpg" alt="sample67" />
  <figcaption style="font-family: Righteous, cursive; margin: 0px 0px;">
    <h3>SIGUENOS</h3>
    <p>en instangram</p>
  </figcaption><i class="ion-ios-home-outline"></i>
  <a href="https://www.instagram.com/corrientefluye/"></a>
</figure>
    </div>

    
 
    



<script>
    $(".hover").mouseleave(
  function () {
    $(this).removeClass("hover");
  }
);</script> <br><br><br><br><hr><br><br><br><br><br>
<!-- ------------------------------------------------ G A L E R I A ------------------------------------------------------------ -->
    
    <div class="container">

<div class="row  justify-content-center align-items-center d-flex text-center h-100">
    <div class="knockout"><a  rel=""  style="font-family: 'Permanent Marker', cursive;">Clientes Satisfechos</a></div> </div>
<div class="col-md-12">
<div class="row">
<hr>

	<div class="gal">
	
			<img src="media/g2.jpg" alt="">
			<img src="media/g3.jpg" alt="">
			
		
			<img src="media/g4.jpg".jpg alt="">
				<img src="media/g5.jpg" alt="">
					
				<img src="media/g7.jpg" alt="">			
				<img src="media/g6.jpg" alt="">
				
	</div>
	
</div>
</div>
</div>

    <!--  --------------------------------------- C H A T --------------------------------------------------------------- -->  
<?php
if(!empty($_SESSION["user"]))
{?>
<button class="open-button" onclick="openForm()" style="font-size:20px"><i class="fa fa-comments fa-2x"></i></button>
	<div id="contenedor">
        <div class="chat-popup" id="myForm">
		<form class="form-container" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"?>
		<div id="caja-chat">
			<div id="chat"></div>
		</div>
			<textarea name="mensaje" placeholder="¡Dinos algo!" required></textarea>
			<button type="submit" name="enviar" value="Enviar" class="btn">Enviar</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Cerrar</button>
		</form>
        </div>

		<?php
			if (isset($_POST['enviar'])) {
				
				$nombre = $_SESSION["user"]; 
				$mensaje = $_POST['mensaje'];
                    $check = $conexion->query('select 1 from `TABLE`');
                        //Creamos la tabla del usuario
                        $sql = "CREATE TABLE `chatapp`.`$nombre` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `nombre` VARCHAR(30) NOT NULL , `mensaje` VARCHAR(255) NOT NULL , `fecha` TIMESTAMP NOT NULL , PRIMARY KEY (`id`))";
                        $conexion->query($sql);
                        //Metemos el mensaje a la tabla del usuario
                        $consulta = "INSERT INTO `$nombre` (`nombre`, `mensaje`) VALUES ('$nombre', '$mensaje');";
                        $conexion->query($consulta);
			}
}
		?>
	</div>

<script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest();

			req.onreadystatechange = function(){
				if (req.readyState == 4 && req.status == 200) {
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}

			req.open('GET', 'chat.php', true);
			req.send();
		}

		//linea que hace que se refreseque la pagina cada segundo
		setInterval(function(){ajax();}, 1000);
	</script>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

    <!--  --------------------------------------- P I E --------------------------------------------------------------- -->  
<footer style="font-family: Righteous, cursive;">
     <div class="container-fluid bg-primary py-3"  id="ccol">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
            <div class="row py-0">
          <div class="col-sm-3 hidden-md-down">
              
                <img src="media/logo.jpg" width="80px" alt="">
           
            </div>
            <div class="col-sm-9 text-white cnt">
                <div><h4  style="font-family: 'Permanent Marker', cursive;">  CORRIENTE</h4>
                    <p>   <span class="header-font"></span><span class="header-font"></span>todoFluye.com</p>
                        <?php
                            require 'contador.php';
                        ?>
                    
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4 cnt">
          <div class="d-inline-block">
            <div class="bg-circle-outline d-inline-block" style="background-color:#3b5998">
              <a href="https://www.facebook.com/Corrientefluye/" target="_blank"><i class="fa fa-2x fa-fw fa-facebook text-white"></i>
		</a>
            </div>
            

            <div class="bg-circle-outline d-inline-block" style="background-color:#d34836">
              <a href="https://www.instagram.com/corrientefluye/" target="_blank">
                <i class="fa fa-2x fa-fw fa-instagram text-white"></i></a>
            </div>
          </div>
          <div id="cupones">
              <form method="post" >
                  <input style="color: black" type="email" placeholder="Dirección de email" name="customer_email"  id="in-cpn" required><br>
                  <?php
                    if(isset($_POST['send']))
                    {
                        include("sendemail.php");
                        $mail_username = "corrientefluye@gmail.com";
                        $mail_userpassword = "WongHueleAPerro";
                        $mail_addAddress = $_POST['customer_email'];
                        $template = "email_templateCup.html";
                        
                        $randomNumber = rand(1,3);
                        $mail_setFromEmail = $_POST['customer_email'];
                        $mail_setFromName = "¡Felicidades!";
                        $entrada = array("https://i.ibb.co/Bf8NQKb/cup1.jpg", "https://i.ibb.co/dKGvQ2N/cup2.jpg", "https://i.ibb.co/ftz9zBw/cup3.jpg");
                        $x = array_rand($entrada);
                        $txt_message=$entrada[$x];
                        $mail_subject="Suscripcion";
                        //Enviar el mensaje
                        sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);
                    }
                  ?>
                  <button name="send" type="submit" style="background-color: greenyellow" class="btn  shadow-lg btn-round text-light btn-lg btn-rised" id="btn-cpn">Suscribete Ahora</button>
              </form>
          </div>
        </div>
        </div>
    </div>
    <p class="text-white">@2019 Corriente | Todos los derechos reservados.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
</body>
</html>



