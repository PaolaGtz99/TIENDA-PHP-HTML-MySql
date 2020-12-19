 <?php
if(isset($_POST['send'])){
    $send=$_POST['send'];
     include("sendemail.php");//Mando a llamar la funcion que se encarga de enviar el correo electronico
    /*Configuracion de variables para enviar el correo*/
    $mail_username="corrientefluye@gmail.com";//Correo electronico saliente, el de la empresa
    $mail_userpassword="WongHueleAPerro";//Contraseña del correo de la empresa
    $mail_addAddress;       //correo electronico que recibira el mensaje que Tzoali saca de su bd
    $template="email_templatePass.html";//Ruta de la plantilla HTML para enviar nuestro mensaje al cliente
    /*Inicio captura de datos enviados por $_POST para enviar el correo */
    $mail_setFromEmail;       //correo electronico que recibira el mensaje que Tzoali saca de su bd
    $mail_setFromName=substr(str_shuffle(uniqid(5)),-5);
    $mail_setFromName2=password_hash($mail_setFromName,PASSWORD_DEFAULT,[11]);
     $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='prendas';

     $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
        die('Error en la conexion');
    }
    $sql="SELECT `correo` FROM `usuarios` WHERE `cuenta`='".$send."'";
    $resultado=$conexion->query($sql);
    $resultado=$resultado->fetch_assoc();
    $mail_addAddress= $resultado['correo'];
    $mail_setFromEmail= $resultado['correo'];
    $sql="UPDATE `usuarios` SET `contra`='".$mail_setFromName2."', `bloqueada`=3 WHERE `cuenta`='".$send."'";
    $resultado=$conexion->query($sql);
    $txt_message="Introduce el código que se te proporciona para poder tener acceso de nuevo a tu cuenta";
    $mail_subject="Recuperar contraseña";
    //Enviar el mensaje
    sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);
}
      
?>