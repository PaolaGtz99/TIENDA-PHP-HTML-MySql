"use strict";
        function muestra(){
            if(document.getElementById("mostrar").style.display=="none"){
                document.getElementById("mostrar").style.display="block";     
            }else{
                document.getElementById("mostrar").style.display="none";
            }
        }

        var name;
        var valor = "blan";
        var expiracion = "30";
        var fontSize=1;
        var color="blan";
        function verCookies(){
            alert("Cookies actuales:\n"+document.cookie);
        }
        
        function crearModifCookie(){
            name = document.getElementById("usuario").value;
            valor = "blan";
            expiracion = "30";
            setCookie(name, valor, expiracion);
            verCookies();
        }
        
        function leerCookie(){
            var nombre = prompt("Introduzca el nombre de la cookie a consultar");
            var resultado = getCookie(nombre);
            alert(resultado);
        }
        
        function borrarCookie(){
            var nombre = prompt("Introduzca el nombre de la cookie a borrar");
            deleteCookie(nombre);
            verCookies();
        }
        
        function deleteCookie(nombre){
            setCookie(nombre,"",0);
        }
        
        function setCookie(nombre, valor, expiracion){
            var d = new Date();
            d.setTime(d.getTime()+expiracion*24*60*60*1000);
            var expiracion2 = "expires="+d.toUTCString();
            document.cookie = nombre+"="+valor+";"+expiracion2+";path=/";
            console.log(document.cookie);
            
        }
        
        function getCookie(nombre){
            var nom = nombre+"=";
            var array = document.cookie.split(";");
            for (var i=0; i<array.length; i++){
                var c = array[i];
                while (c.charAt(0)==" "){ 
                    c = c.substring(1);
                }
                if (c.indexOf(nombre)==0){
                    return c.substring(nom.length, c.length);
                }
            }
            return "";
        }
        
        function user(){
            if(typeof(name) !== 'undefined')
                nameDefine();
            comparar(name);
        }
            
        function comparar(usuario){
            var nom = usuario+"=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            var ban=0;
            var valor="nada";
            for(var i = 0; i <ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                  c = c.substring(1);
                }
                if (c.indexOf(nom) == 0) {
                  valor= c.substring(nom.length, c.length);
                    ban=1;
                }
              }
            if(ban==1){
                var tam=valor.substr(5);
                var pos=tam.lastIndexOf(".");
                if(pos!=-1)
                    tam=tam.substr(0,pos+3);
                fontSize=parseFloat(tam);
                color=valor.substr(0,4);
                if(color == "blan"){
                    document.body.style.backgroundColor='#fff';
                    document.body.style.color='#000';
                }else if(color == "rojo"){
                    document.body.style.backgroundColor='#CC3';
                    document.body.style.color='#00F';
                }else if(color == "negr"){
                    document.body.style.backgroundColor='#000';
                    document.body.style.color='#FF0';
                }
                if(fontSize<0.1)
                    fontSize=0.1;
                document.body.style.fontSize = fontSize + "em";
            }
            
            
        }
 
        // funcion para aumentar la fuente
        function zoomIn() {
            fontSize += 0.1;
            document.body.style.fontSize = fontSize + "em";
            var d = new Date();
            d.setTime(d.getTime()+expiracion*24*60*60*1000);
            var expiracion2 = "expires="+d.toUTCString();
            document.cookie = name+"="+color+":"+fontSize+";"+expiracion2+";path=/";
        }
 
        // funcion para disminuir la fuente
        function zoomOut() {
            fontSize -= 0.1;
            if(fontSize<0.1)
                    fontSize=0.1;
            document.body.style.fontSize = fontSize + "em";
            var d = new Date();
            d.setTime(d.getTime()+expiracion*24*60*60*1000);
            var expiracion2 = "expires="+d.toUTCString();
            document.cookie = name+"="+color+":"+fontSize+";"+expiracion2+";path=/";
        }
        

        function rojo(){
            if(typeof(name) !== 'undefined')
                nameDefine();
            document.body.style.backgroundColor='#CC3';
            document.body.style.color='#00F';
            color="rojo";
            var d = new Date();
            d.setTime(d.getTime()+expiracion*24*60*60*1000);
            var expiracion2 = "expires="+d.toUTCString();
            document.cookie = name+"="+"rojo:"+fontSize+";"+expiracion2+";path=/";
        }
        
        function blanco(){
            if(typeof(name) !== 'undefined')
                nameDefine();
            document.body.style.backgroundColor='#fff';
            document.body.style.color='#000';
            color="blanc";
            var d = new Date();
            d.setTime(d.getTime()+expiracion*24*60*60*1000);
            var expiracion2 = "expires="+d.toUTCString();
            document.cookie = name+"="+"blan:"+fontSize+";"+expiracion2+";path=/";
            alert(expiracion2);
        }
        
        function negro(){
            if(typeof(name) !== 'undefined')
                nameDefine();
            document.body.style.backgroundColor='#000';
            document.body.style.color='#FF0';
            color="negr";
            var d = new Date();
            d.setTime(d.getTime()+expiracion*24*60*60*1000);
            var expiracion2 = "expires="+d.toUTCString();
            document.cookie = name+"="+"negr:"+fontSize+";"+expiracion2+";path=/";
        }

function nameDefine() {
    name=document.getElementById("user").innerHTML;
}

