<?php
   session_start();
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='prendas';
     
    //conexion a la base de datos
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
         die('Error en la conexion');
    }


if(isset($_POST['alta'])){
    
                //obtenemos datos del formulario
                $id = $_POST['id'];
                $descripcion =$_POST['descripcion'];
                $precio =$_POST['precio'];
                $nombre =$_POST['nombre'];
                $existencia =$_POST['existencia'];
                $img = $_FILES['imagen']['name'];
                
                //hacemos cadena con la sentencia mysql para insertar datos
    
    if($_POST['tipo']=="playeras"){
        $sql = "INSERT INTO playeras (id, nombre, descripcion, imagen, precio, existencia) VALUES('$id','$nombre','$descripcion','$img','$precio','$existencia')";
        $targetdir = 'media/PLAYERA/'; 
    }
    else{
        $sql = "INSERT INTO sudaderas (id, nombre, descripcion, imagen, precio, existencia) VALUES('$id','$nombre','$descripcion','$img','$precio','$existencia')";
        $targetdir = 'media/SUDADERA/'; 
    }
            
            $conexion->query($sql);  //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos

            //guardamos imagen en /media
              
            $targetfile = $targetdir.$_FILES['imagen']['name'];
            move_uploaded_file($_FILES['imagen']['tmp_name'], $targetfile);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modificar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://fonts.googleapis.com/css?family=Patrick+Hand|Permanent+Marker|Righteous&display=swap" rel="stylesheet">
    <link rel="icon" type="image/vnd.microsoft.icon" href="media/favicon.ico">
    <link rel="stylesheet" href="css/cssmod.css">
    
    
</head>
<body>
    <!-- ----------------------------------- M E N U ------------------------------------------------------------ -->
    
    <div class="container-fluid" style="font-family: 'Righteous', cursive;">
        <div class="row">
            <div class="col-md-2 col-sm-3 sidebar2">
                <div class="logo text-center">
                    <img src="media/blacklogo.png" width="100px" class="img-responsive center-block" alt="Logo"> 
                  <br>
                  <br>
                  <h4>CORRIENTE</h4>

                </div>
                <br>

                <div class="left-navigation">

                    <ul class="list">

                        <li><i class="fa fa-upload" aria-hidden="true"></i><a href="#alta">Altas</a></li>
                        <li><i class="fa fa-trash" aria-hidden="true"></i><a href="#baja">Bajas</a></li>
                        <li><i class="fa fa-cog" aria-hidden="true"></i><a href="#modificar">Modificacion</a></li>
                        <li><i class="fa fa-comments" aria-hidden="true"></i><a href="chatchat.php">Chat</a></li>
                        <li><i class="fa fa-pie-chart" aria-hidden="true"></i><a target="_blank" href="count.php">Estadisticas</a></li>
                        <br>
                        <li><i class="fa fa-home" aria-hidden="true" style="color: red"></i><a href="index.php" style="color: red">VolverInicio</a></li>
                       
                    </ul>
                </div>
            </div>
            <div class="col-md-4" ></div>
            
            <div class="col-md-6 col-sm-8 main-content" >
               <div class="content">
			<!--Main content code to be written here --> 
           
           
            <!-- ----------------------------------- A L T A S ------------------------------------------------------------ -->
            <section class="get-in-touch" id="alta">
               <h1 class="title">NUEVO PRODUCTO</h1>
               
               <form class="contact-form row" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                 
                  <div class="form-field col-lg-6">
                     <input id="name" name="id" class="input-text js-input" type="text" required>
                     <label class="label" for="name">ID</label>
                  </div>
                  
                  <div class="form-field col-lg-6 ">
                     <input id="text" name="nombre" class="input-text js-input" type="text" required>
                     <label class="label" for="email">Nombre</label>
                  </div>
                  
                  <div class="form-field col-lg-6 ">
                     <input id="text" name="precio" class="input-text js-input" type="number" required>
                     <label class="label" for="company">precio</label>
                  </div>
                  
                   <div class="form-field col-lg-6 ">
                    <select class="browser-default custom-select" name="tipo" id="gen" required>
                        <option selected disabled>Tipo</option>
                         <option value="playeras">Playera</option>
                         <option value="sudaderas">Sudadera</option>
                     </select>
                  </div>
                  
                  <div class="form-field col-lg-6 ">
                     <input id="number" name="existencia" class="input-text js-input" type="number" required>
                     <label class="label" for="company">Existencia</label>
                  </div>
                  
                   <div class="form-field col-lg-6 ">
                   
                    
                      
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                          aria-describedby="inputGroupFileAddon01" name="imagen" required>
                        <label class="custom-file-label" for="inputGroupFile01">Imagen</label>
                      </div>
                    
                  </div>
                  
                  <div class="form-field col-lg-12">
                     <input id="message" name="descripcion" class="input-text js-input" type="text" required>
                     <label class="label" for="message">Descripcion</label>
                  </div>
                  
                  <div class="form-field col-lg-12">
                     <input class="submit-btn" name="alta" type="submit" value=" Dar de alta">
                  </div>
               </form>
            </section> 
            <br><br>
            
         <!-- ----------------------------------- B A J A S ------------------------------------------------------------ -->   
            
            <section class="get-in-touch" id="baja">
               <h1 class="title">BAJAS</h1>
               
             <div class="contact-form row" >
                 <div class="col-lg-3"></div>
                  <div class="form-field col-lg-6">
                     <input id="Bajas" name="eliminar" class="input-text js-input" onkeypress="validar(event)" type="text" required>
                     <label class="label" for="Bajas">ID de producto a dar de baja</label>
                  </div>
                
                  <div class="form-field col-lg-6">
                     <!-- <input id="prod" name="descripcion" class="input-text js-input" type="text" readonly="readonly">  --> 
                     <textarea name="" id="prod" cols="30" rows="9" readonly  ></textarea> 
                     <input class="submit-btn" name="baja" type="button" value=" Dar de baja" onclick="darDeBaja()" >
                     
                  </div>
                  <div class="form-field col-lg-6">
                     <img src="media/img.jpg" id="imgProd" width="240px" alt="" style="border: 2px solid #5543ca">   
                  </div>
         
              </div> 
               
            </section> 
            
 <script>  
     function darDeBaja(){
         
         if(document.getElementById("prod").innerHTML == ""|| document.getElementById("prod").innerHTML == "ERROR ID no encontrado"
           || document.getElementById("prod").innerHTML == "ERROR, Selecciona un producto"){
            document.getElementById("prod").innerHTML = "ERROR, Selecciona un producto";
            }
     else {
         var ID = document.getElementById("Bajas").value;
         
         var xhttp = new XMLHttpRequest();
        var url = "bajas.php";
        var params = "id=" + ID;

        xhttp.open("POST",url,true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
         document.getElementById("Bajas").value = "";
         document.getElementById("prod").innerHTML = "Producto Eliminado";
                    document.getElementById("imgProd").src = "media/img.jpg";
     }
     }
     
    function validar(e) {
    
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla==13){
var ID = document.getElementById("Bajas").value;

  var xhttp = new XMLHttpRequest();
        var url = "obDatos.php";
        var params = "id=" + ID;

        xhttp.open("POST",url,true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);

        xhttp.onreadystatechange = function(){
            if (xhttp.readyState == 4 && xhttp.status == 200){

                // Obtenemos la respuesta
                var respuesta = JSON.parse(xhttp.responseText);

                // Tambien obtenemos el div donde escribiremos nuestra tabla
                // Si si lo encontramos
                if (respuesta != "FALSE"){
          
                    document.getElementById("prod").innerHTML = respuesta[0];
                    document.getElementById("imgProd").src = respuesta[1];
                    
              
                } else { // No lo encontro
             
                    document.getElementById("prod").innerHTML = "ERROR ID no encontrado";
                    document.getElementById("imgProd").src = "media/img.jpg";
                  
                }
            }
        }
            
        }}
 
                   </script>
            
             <!-- ----------------------------------- M O D I F I C A R ------------------------------------------------------------ -->
            
            <section class="get-in-touch" id="modificar">
               <h1 class="title">MODIFICAR</h1>
               
             <div class="contact-form row" >
                 <div class="col-lg-3"></div>
                  <div class="form-field col-lg-6">
                     <input id="idMod" name="mod" class="input-text js-input" onkeypress="validarMod(event)" type="text" required>
                     <label class="label" for="mod">ID de producto</label>
                  </div>
                
                  <div class="form-field col-lg-6">
                     <input id="nomMod" name="nomMod" class="input-text js-input" type="text" placeholder="Nombre">
                     <input id="preMod" name="preMod" class="input-text js-input" type="number" placeholder="Precio">
                     <input id="exMod" name="exMod" class="input-text js-input" type="number" placeholder="Existencia">
                     <input id="descMod" name="descMod" class="input-text js-input" type="text" placeholder="Descripcion">
                     
                     <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="imagen" >
                     <input class="submit-btn" name="modificar" type="button" value="Modificar" onclick="Modificar()" >
                  </div>
                  <div class="form-field col-lg-6">
                     <img src="media/img.jpg" id="imgMod" width="240px" alt="" style="border: 2px solid #5543ca">   
                 
                   
                    
                      
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="imgmod"
                          aria-describedby="inputGroupFileAddon01" name="imagenMod" required>
                        <label class="custom-file-label" for="img">Seleccionar Imagen</label>
                      </div>
                    
                 
                  </div>
         
              </div> 
               
            </section> 
            
   <script>  
     function Modificar(){
         
    
        var ID = document.getElementById("idMod").value;
         var NOM = document.getElementById("nomMod").value;
         var EX = document.getElementById("exMod").value;
         var DES = document.getElementById("descMod").value;
         var PRE = document.getElementById("preMod").value;
         var uploadFile = document.getElementById("imgmod");
         
 
         
         if (uploadFile.value.length != 0) {
                
                var IMG = document.getElementById('imgmod').files[0].name;
             var band=1;
             
            }
         else {
             var IMG = 0;
              var band=0;
         }

         var xhttp = new XMLHttpRequest();
        var url = "cambio.php";
        var params = "id=" + ID + "&nom=" + NOM + "&pre=" + PRE + "&exist=" + EX + "&descrip=" + DES + "&img=" + IMG + "&b=" + band ;
         
        xhttp.open("POST",url,true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
         
         document.getElementById("idMod").value = "CAMBIO EXITOSO";
                    document.getElementById("imgMod").src = "media/img.jpg";
                    document.getElementById("nomMod").value = "";
                    document.getElementById("preMod").value = "";
                    document.getElementById("exMod").value = "";
                    document.getElementById("descMod").value = "";
                  
     }
     
       
    function validarMod(e) {
    
 tecla = (document.all) ? e.keyCode : e.which;
 if (tecla==13){
var ID = document.getElementById("idMod").value;

  var xhttp = new XMLHttpRequest();
        var url = "obDatos2.php";
        var params = "id=" + ID;

        xhttp.open("POST",url,true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);

        xhttp.onreadystatechange = function(){
            if (xhttp.readyState == 4 && xhttp.status == 200){

                // Obtenemos la respuesta
                var respuesta = JSON.parse(xhttp.responseText);

                // Tambien obtenemos el div donde escribiremos nuestra tabla
                // Si si lo encontramos
                if (respuesta != "FALSE"){
          
                    document.getElementById("nomMod").value = respuesta[0];
                    document.getElementById("preMod").value = respuesta[1];
                    document.getElementById("exMod").value = respuesta[2];
                    document.getElementById("descMod").value = respuesta[3];
                    document.getElementById("imgMod").src = respuesta[4];
                    
              
                } else { // No lo encontro
             
                    document.getElementById("idMod").value = "ERROR ID no encontrado";
                    document.getElementById("imgMod").src = "media/img.jpg";
                    document.getElementById("nomMod").value = "";
                    document.getElementById("preMod").value = "";
                    document.getElementById("exMod").value = "";
                    document.getElementById("descMod").value = "";
                  
                }
            }
        }
            
        }}
 
                   </script>         
            
            </div>
        </div>
    </div>
 </div>
 
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 

</body>
</html>