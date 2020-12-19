<?php
session_start();


$servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='prendas';
$conexion = new mysqli($servidor,$cuenta,$password,$bd);
$sql = 'select * from sudaderas';
$resultado = $conexion -> query($sql); 
if (empty($_SESSION['carrito'])){
  $_SESSION['carrito'] = array();  
    $_SESSION['productos']=0;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Corriente</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/css2.css">
    <link href="https://fonts.googleapis.com/css?family=Patrick+Hand|Permanent+Marker|Righteous&display=swap" rel="stylesheet">
    <link rel="icon" type="image/vnd.microsoft.icon" href="media/favicon.ico">
    
    <style>
        .m:hover{
            border-bottom: 2px solid greenyellow;
            padding-bottom: 4px;
            font-size: 20px;
        }
        .sub:hover{
            background-color: greenyellow;
        }
        
        .cart-box{
     position: fixed;
  bottom: 40px;
  right: 30px;
  width: 48px;
  height: 48px;
  z-index: 2147483000;
  cursor: pointer;
  background-position: 50%;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.btn-circle.btn-lg {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
}
.btn-circle.btn-xl {
  width: 70px;
  height: 70px;
  padding: 10px 16px;
  font-size: 24px;
  line-height: 1.33;
  border-radius: 35px;
}
.cart-items-count{
    position:relative;
    display:flex;
    text-align:center;
    justify-content: center;
    top:-55px;
}

.notification-counter {   
    position: absolute;
    left: 8px;
    background-color: rgba(212, 19, 13, 1);
    color: #fff;
    border-radius: 3px;
    padding: 1px 3px;
    font: 8px Verdana;
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
 <!--  --------------------------------------- C A R R I T O --------------------------------------------------------------- --> 
  
 <div class="cart-box" id="Normal">
    <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="temporal.php?variable=-1" ><button class="draggable  btn btn-primary bg-light btn-circle btn-xl"  role="button" aria-expanded="false"> <i class="fa fa-shopping-cart fa-lg" style="color: black" aria-hidden="true"></i></button>
           <span  class="cart-items-count"><span class=" notification-counter" id="carro"><?php echo $_SESSION['productos']; ?></span></span></a>
        </li>
      </ul>
</div>

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
                         <li style="padding: 7px;" class="sub"><a href="playeras.php">Playera <i class="fa fa-male" aria-hidden="true"></i></a></li>
                         <li style="padding: 4px; border-left: 2px solid white;" class="sub"><a href="sudaderas.php"> <i class="fa fa-female" aria-hidden="true"></i>Sudadera</a></li>
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

<svg viewBox="0 0 1800 600">
  <symbol id="s-text">
    <text text-anchor="middle"
          x="50%"
          y="35%"
          class="webcoderskull"
          >
      CORRIENTE 
    </text>
    <text text-anchor="middle"
          x="50%"
          y="68%"
          class="text--line"
          >
     SUDADERAS
    </text>
    
  </symbol>
  
  <g class="g-ants">
    <use xlink:href="#s-text"
      class="webcoderskull-1"></use>     
    <use xlink:href="#s-text"
      class="webcoderskull-1"></use>     
    <use xlink:href="#s-text"
      class="webcoderskull-1"></use>     
    <use xlink:href="#s-text"
      class="webcoderskull-1"></use>     
    <use xlink:href="#s-text"
      class="webcoderskull-1"></use>     
  </g>
  
  
</svg>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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


<!--  ---------------------------------------  R O P A ---------------------------------------------------------------   -->
 <div class="container">
   
   <br><br>
    <div class="row">
    <?php $numPro = 1;
         while( $fila = $resultado -> fetch_assoc()){ ?>
            
             
        <div class="col-md-3 col-sm-6">
            <div class="product-grid6" style="margin-bottom: 30px">
                
             
             <?php 
             $desc=rand(30,200);
             echo '<div class="product-image6" style="margin-top: 30px; ">
                    <a href="#"> 
                    <img class="pic-1" src="media/SUDADERA/'.$fila['imagen'].'">
             
             </a>
                </div>
                <div class="product-content border" >
                    <h3 class="title"><a href="#" style="font-family: Righteous, cursive;">'.$fila['nombre'].'</a></h3>';
                    
                    if($desc<101){
                 $pre=rand(50,200);
                 $final = $fila['precio'] - $pre;
                 echo '<div class="price" style="font-family: Righteous, cursive;">$'.$final.'.00';
                 if($fila['existencia']==0){
                 echo '<span style="color:red">AGOTADA</span>';
                     $ax=' ';
                    }
                 else if($fila['existencia']>0){
                     $ax='href="carrito.php?id='.$fila["id"].'" target="_blank"';
                     echo '<span style="color:red" > $'. $fila['precio'] .'.00  </span>';
                 }else
                     $ax=' ';
                
             }
             else{
                 echo '<div class="price" style="font-family: Righteous, cursive;">$'.$fila['precio'].'.00';
                 $ax='href="carrito.php?id='.$fila["id"].'" target="_blank"';
                 if($fila['existencia']==0){
                 echo '<span style="color:red">AGOTADA</span>';
                     $ax=' ';
                    }
             }
                        
                echo '     </div> <span id='.$numPro.' style="display:none"> '.$fila['descripcion'].' </span>
                </div>';   
             ?>
             
            <ul class="social">
                   <?php
                    echo '<li><a onclick="descrip('.$numPro.')" data-tip="Descripcion"><i class="fa fa-search"></i></a></li>';
                    
                    echo '<li><a  data-tip="Add to Cart" onclick="añadir('. $fila['id'].','.$fila['existencia'] .')" '.$ax.'"><i class="fa fa-shopping-cart" ></i></a></li>';
                    ?>
                </ul>
                          
            
        </div>
            </div><?php  $numPro = $numPro + 1; } ?> <!-- fin del while -->
        </div> 
           </div>
  
        <script>
            function descrip(idPro){
                
                if(document.getElementById(idPro).style.display == 'none' ){document.getElementById(idPro).style.display='block';}
                
                else {
                    document.getElementById(idPro).style.display='none';
                }
            }
       
    </script>
   
        ?>
                           
<script>
    
    function añadir(idAdd,exist){
        
        if(document.getElementById("user").innerHTML=="nadie"){
            alert("inicia sesion");
        }
        else if(exist==0){
            alert("no hay producto");
        }
        else{
            document.getElementById("carro").innerHTML = parseInt(document.getElementById("carro").innerHTML)+1;
        
        var xhttp = new XMLHttpRequest();
        var url = "add.php";
        var params = "id=" + idAdd;
         
        xhttp.open("POST",url,true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
        }
        
        
        
    }
    
   
    </script>
   
    <!--  --------------------------------------- P I E --------------------------------------------------------------- -->  
<footer>
     <div class="container-fluid bg-primary py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
            <div class="row py-0">
          <div class="col-sm-3 hidden-md-down">
              
                <img src="media/logo.jpg" width="80px" alt="">
           
            </div>
            <div class="col-sm-9 text-white">
                <div><h4>  CORRIENTE</h4>
                    <p>   <span class="header-font"></span><span class="header-font"></span>todoFluye.com</p>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-3">
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
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
</body>
</html>



