<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/log.css">
       <link rel="icon" type="image/vnd.microsoft.icon" href="media/favicon.ico">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://use.fontawesome.com/d9cd240a9e.js"></script>  
     <link href="https://fonts.googleapis.com/css?family=Patrick+Hand|Permanent+Marker|Righteous&display=swap" rel="stylesheet">
<style>
    #vi:hover{
        text-decoration: none;
        
    }
    </style>

    <script>

        var code = null;

    function Captcha(mainCaptcha) {
    var alpha = new Array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','x','y','z','#','$','%','&','=');
    var i;
    for (i = 0; i < 6; i++) {
        var a = alpha[Math.floor(Math.random() * alpha.length)];
        var b = alpha[Math.floor(Math.random() * alpha.length)];
        var c = alpha[Math.floor(Math.random() * alpha.length)];
        var d = alpha[Math.floor(Math.random() * alpha.length)];
        var e = alpha[Math.floor(Math.random() * alpha.length)];
        var f = alpha[Math.floor(Math.random() * alpha.length)];
        var g = alpha[Math.floor(Math.random() * alpha.length)];
    }
    code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' ' + f + ' ' + g;

   CreaIMG(code);  //linea cambiada llamando a la función para crear la imagen en un canvas

    code = a + b +  c + d  + e + f  + g;

}

    function ValidCaptcha() {

            var txtInput = document.getElementById("txtInput").value;

           if(txtInput == code){
              // alert("Equal");
                       document.getElementById("error").innerHTML= "\ Captcha Correcto prosiga :) ";
                       document.getElementById("shadow").style.display= 'inline';
                       document.getElementById("shadow").innerHTML="LOGIN";
             return true;
           }else{
   // alert("Not Equal");
                    
                       document.getElementById("error").innerHTML= "\ Captcha Incorrecto intentelo de nuevo";
                        document.getElementById("shadow").style.display= 'none';
                       document.getElementById("shadow").innerHTML="";

            return false;}




}

function removeSpaces(string) {
    return string.split(' ').join('');
}


function CreaIMG(texto) {
    var ctxCanvas = document.getElementById('captcha').getContext('2d');
    var fontSize = "30px";
    var fontFamily = "Arial";
    var width = 250;
    var height = 50;
    var angulo = Math.floor(Math.random() * (20 - 70) + 20);
    //tamaño
    ctxCanvas.canvas.width = width;
    ctxCanvas.canvas.height = height;

    //color de fondo
    ctxCanvas.fillStyle = "whitesmoke";
    ctxCanvas.fillRect(0, 0, width, height);
    //puntos de distorsion
    ctxCanvas.setLineDash([17, 10]);
    ctxCanvas.lineDashOffset = 5;
    ctxCanvas.beginPath();
    var line;
    for (var i = 0; i < (width); i++) {
        line = i * 5;
        ctxCanvas.moveTo(line, 0);
        ctxCanvas.lineTo(0, line);
    }
    ctxCanvas.stroke();

    //formato texto
    ctxCanvas.direction = 'ltr';
    ctxCanvas.font = fontSize + " " + fontFamily;

    //texto posicion
    var x = (width / 9);
    var y = (height / 3) * 2;

    //color del borde del texto
    ctxCanvas.strokeStyle = "white";
    ctxCanvas.strokeText(texto, x, y);
    //color del texto
    ctxCanvas.fillStyle = "orange";
    ctxCanvas.fillText(texto, x, y);
}

    </script>


<script>
function popup(){
   swal("Introduzca su nombre de usuario:", {
  content: "input",
})
.then((value) => {
      var xhttp = new XMLHttpRequest();
        var url = "recuperar.php";
        var params = "send=" + value;
         
        xhttp.open("POST",url,true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
  swal(`Se envio el correo con la nueva contraseña al correo de la cuenta ${value}`);
});
}
   

</script>    
</head>

 <body onload="Captcha('mainCaptcha');">
      
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<div class="cotn_principal" ><br><br>
<a id="vi" href="index.php" style="font-family: 'Permanent Marker', cursive;"><button type="button" class="btn btn-secondary btn-lg btn-block">Volver al inicio</button></a>

<div class="cont_centrar">

  <div class="cont_login" >
<div class="cont_info_log_sign_up" >
      <div class="col_md_login" >
<div class="cont_ba_opcitiy" style="font-family: 'Permanent Marker', cursive;" >
        
        <h2 style="font-family: 'Permanent Marker', cursive;">LOGIN</h2>  
  <p></p> 
  <button class="btn_login" onclick="cambiar_login()" style="font-family: 'Permanent Marker', cursive;" >LOGIN</button>
  </div>
  </div>
<div class="col_md_sign_up">
<div class="cont_ba_opcitiy">
  <h2 style="font-family: 'Permanent Marker', cursive;">SIGN UP</h2>

  
  <p></p>

  <button class="btn_sign_up" onclick="cambiar_sign_up()" style="font-family: 'Permanent Marker', cursive;">SIGN UP</button>
</div>
  </div>
       </div>

    
    <div class="cont_back_info">
       <div class="cont_img_back_grey">
       <img src="" alt="" />
       </div>
       
    </div>
<div class="cont_forms" >
    <div class="cont_img_back_">
       <img src="" alt="" />
       </div>
 <div class="cont_form_login" >
<a href="#" onclick="ocultar_login_sign_up()" ><i class="fa fa-times" aria-hidden="true"></i></a>
   <h2 >LOGIN</h2>
 <form class="form" role="form" action="login2.php" method="post">
                            <div class="form-group">
                                <input name="usuario" id="emailInput" placeholder="User" type="text"  
                                value="<?php if(isset($_COOKIE["usuario"])) { echo $_COOKIE["usuario"]; } ?>" required="" >
                            </div>
                            <div class="form-group">
                                <input name="palabra_secreta" id="passwordInput" placeholder="Password" type="password" value="<?php if(isset($_COOKIE["palabra_secreta"])) { echo $_COOKIE["palabra_secreta"]; } ?>"  required="">
                                
                            </div>
                            <a onclick="popup()" style="color: green" style="font-family: 'Righteous', cursive;"><i>Olvide mi contraseña</i></a><br><br>
                            <div class="form-group">
                                <canvas id="captcha" style="transform: rotate(5deg);" ></canvas>
                                <!--  linea cambiada llamando a la función para crear la imagen en un canvas -->
                                 <br>
                                 <input size="20px" type="text" id="txtInput"/>
                                 <script>
                                    function ValidaWeb() {
                                    ValidCaptcha() ;
                                    }
                                 </script>
                                 <br><br>
                                
                                  <input type="button" id="refresh" value="Refresh" onclick="Captcha('mainCaptcha');" class="btn btn-danger pull-right" /> 
                                  <input type="button" value="Comprobar" onclick="ValidaWeb()" class="btn btn-danger pull-right">
                                  
                                 <div id="error"></div><input type="hidden" id="cajon" value="">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn_login" id="shadow" style="display: none;" ></button>
                                
                            <p>
                             <br><br>
                              <input type="checkbox" name="remember" />Recordar usuario y Contrasenia
                            </p>                                  
                            </div>
                        </form>
                        <br><br>
                        
  </div>
  
   <div class="cont_form_sign_up">
<a href="#" onclick="ocultar_login_sign_up()"><i class="fa fa-times" aria-hidden="true"></i></a>
     <h2>SIGN UP</h2>
<form class="form" role="form" action="registrar.php" method="post" name="f1" onsubmit="return fun()">
            <div class="modal-body">
                   <script>
        function fun(){
            var valor1=document.f1.contrasena.value;
            var valor2=document.f1.contrasena2.value;
            if(valor1.length!=0 && valor1==valor2){
                return true;
            }
            else{
                alert("Las contraseñas no coinciden");
                document.f1.contrasena2.style.borderColor="red";
                document.f1.contrasena.style.borderColor="red";
                return false;
            }
            
        }
    </script>
               <div class="cont_centrar">
                <p>Nombre: <input type="text" name="nombre" required> </p>
                <p>Cuenta: <input type="text" name="cuenta" required> </p>
                <p>Correo: <input type="email" name="correo" required> </p>
                <p>Contraseña: <input type="password" name="contrasena" required> </p>
                <p>Repetir: <input type="password" name="contrasena2" required> </p>
                </div>
                
                </div>
            <div class="modal-footer">                
                <div class="form-group">
                 <button type="submit" class="btn_sign_up" style="font-family: 'Permanent Marker', cursive;" >SIGN UP</button>                  
               </div>
            </div>
            </form>
                



  </div>

    </div>
    
  </div>
 </div>
 
</div>

<script>
    /* ------------------------------------ Click on login and Sign Up to  changue and view the effect
---------------------------------------
*/

function cambiar_login() {
  document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_login";  
document.querySelector('.cont_form_login').style.display = "block";
document.querySelector('.cont_form_sign_up').style.opacity = "0";               

setTimeout(function(){  document.querySelector('.cont_form_login').style.opacity = "1"; },400);  
  
setTimeout(function(){    
document.querySelector('.cont_form_sign_up').style.display = "none";
},200);  
  }

function cambiar_sign_up(at) {
  document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_sign_up";
  document.querySelector('.cont_form_sign_up').style.display = "block";
document.querySelector('.cont_form_login').style.opacity = "0";
  
setTimeout(function(){  document.querySelector('.cont_form_sign_up').style.opacity = "1";
},100);  

setTimeout(function(){   document.querySelector('.cont_form_login').style.display = "none";
},400);  


}    



function ocultar_login_sign_up() {

document.querySelector('.cont_forms').className = "cont_forms";  
document.querySelector('.cont_form_sign_up').style.opacity = "0";               
document.querySelector('.cont_form_login').style.opacity = "0"; 

setTimeout(function(){
document.querySelector('.cont_form_sign_up').style.display = "none";
document.querySelector('.cont_form_login').style.display = "none";
},500);  
  
  }




</script>
<!-- 
      

            <!-- Button trigger modal -->
            
            
            <!-- Modal -->
            

   
   <script>
     function centerModal() {
    $(this).css('display', 'block');
    var $dialog = $(this).find(".modal-dialog");
    var offset = ($(window).height() - $dialog.height()) / 2;
    // Center modal vertically in window
    $dialog.css("margin-top", offset);
}

$('.modal').on('show.bs.modal', centerModal);
$(window).on("resize", function () {
    $('.modal:visible').each(centerModal);
});</script>
    
</body>
</html>