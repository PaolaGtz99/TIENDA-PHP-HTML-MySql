<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="icon" type="image/vnd.microsoft.icon" href="media/favicon.ico">
    <meta charset="UTF-8">
    <title>Corriente</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/cssHTML.css">
    <link href="https://fonts.googleapis.com/css?family=Patrick+Hand|Permanent+Marker|Righteous&display=swap" rel="stylesheet">
    
    
    <style>
        .m:hover{
            border-bottom: 2px solid greenyellow;
            padding-bottom: 4px;
            font-size: 20px;
        }
        .sub:hover{
            background-color: greenyellow;
        }
        
        *{
            max-width: 100%;
        }
        
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
        .active{
            font-size: 25px;
        }
    </style>
          <script src="https://use.fontawesome.com/d9cd240a9e.js"></script>      
</head>
<body onload="user()">
   
<?php
    echo "<p id='user' style='display:none'>";
if(isset($_SESSION['user']))
    echo $_SESSION['user'];
else 
    echo "nadie";
echo "</p>";
  ?>
  <!--  --------------------------------------- M E N U --------------------------------------------------------------- --> 
  <div class="wrapper">
         <header style="font-family: 'Permanent Marker', cursive;">
            <nav>
               <div class="menu-icon">
                  <i class="fa fa-bars fa-2x"></i>
               </div>
               <div class="logo">
                  
               <img src="media/blacklogo.png" width="60px" alt=""> <span style="color: white">CORRIENTE </span>
               <span style="color: greenyellow; font-family: 'Righteous', cursive;  ">"Todo Fluye"</span>
               
              
               </div>
               <div class="menu">
                  <ul class="men">
                     <li><a class="m" href="index.php">Inicio</a></li>
                     <li><a class="m" href="#">Tienda  <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                     <ul >
                         <li style="padding: 7px;" class="sub"><a href="">Playeras <i class="fa fa-male" aria-hidden="true"></i></a></li>
                         <li style="padding: 4px; border-left: 2px solid white;" class="sub"><a href="">Sudaderas <i class="fa fa-female" aria-hidden="true"></i></a></li>
                     </ul></li>
                      <li><a class="m" href="acerca.php">Acerca de</a></li>
                     <li><a class="m" href="contacto.php">Contactanos</a></li>
                     <li><a  class="m" href="ayuda.php">Ayuda</a></li>
                     <?php 
					  if(!empty($_SESSION["user"])){ ?>
           					<li class="m"><?php 
                        	echo $_SESSION['name'];
                    		?><ul class="subm">
                    			<li style="padding: 6px;" class="sub">
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
<div class="page-header" style="background: url(media/head2.jpg)no-repeat;background-size: cover">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-caption">
                        <!-- <h1 class="page-title">ACERCA DE NOSOTROS</h1> -->
                        <br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page-header-->
    <!-- news -->
    <div class="card-section">
        <div class="container">
            <div class="card-block bg-white mb30">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <!-- section-title -->
                        <div class="section-title mb-0">
                            <h2>Nuestro Objetivo es... </h2>
                            <p>Expandir nuestro negocio a todas las regiones del país </p>
                        </div>
                        <!-- /.section-title -->
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
              corriente <a href="index.php" target="_blank">Todo Fluye</a>
              </div></div>
            </div>
            </div>
            
   
    
         </header>
         
      </div>
       <div class="container-fluid"  style="font-family: Righteous, cursive;">
	<div class="row">
	    <div class="col-xs-12 col-md-6">
	        <div class="bg bg-left" style="background: linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)), url()">
	        	<h2>VISION Ser una empresa  líder en la venta de ropa proporcionando cada día más un servicio de excelencia a nuestros clientes y que al mismo tiempo nos permitan competir en el mercado nacional.</h2>
	        </div>
	    </div>
	    <div class="col-xs-12 col-md-6">
            <div class="bg bg-right text-dark" style="background: url(media/acerimg.jpg)">
	        	<h2><br>MISION Ofrecer a nuestros clientes  productos de calidad, a precios cómodos  que cumplan con sus necesidades y exigencias, abarcando sus gustos de acuerdo a su estilo de ver y vivir la vida. <br></h2>
	        </div>
	    </div>
	</div>
</div>
      
      <br><br><br>
      
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
          
         
<!-- ------------------------------------------------ G A L E R I A ------------------------------------------------------------ -->
    
   




    <!--  --------------------------------------- P I E --------------------------------------------------------------- -->  
<footer style="font-family: Righteous, cursive;">
     <div class="container-fluid bg-primary py-3">
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



