<?php
    session_start();
    $arreglo = $_SESSION['carrito'];
    $j=0;$envio = 0;$stotal = 0;
    for($i = 0;$i < count($arreglo);$i++){            
        $subt = $arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'];
        $stotal += $subt;
    }
    $imp = $stotal*.16;
?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="paocss.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
<script>
    $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});</script>
</head>
<body>
    
   
    <div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Step 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Step 2</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Step 3</p>
        </div>
    </div>
</div>
<form role="form" action="confirmacion.php" method="post">
    <div class="row setup-content" id="step-1">
       <div class="col-xs-4"></div>
        <div class="col-xs-6">
           
            <div class="col-md-12">
                
                <div class="container">
	                <div class="row">
		                <div class="paymentCont">
						    <div class="headingWrap">
								<h3 class="headingTop text-center">SELECCIONA TU METODO DE PAGO</h3>	
						    </div>
						    <div class="paymentWrap">
							    <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
					                <label class="btn paymentMethod "  onclick="mostrar(1)">
					            	    <div class="method visa"></div>
					                    <input type="radio" name="pago" value="Visa"> 
					                </label>
					                <label class="btn paymentMethod"  onclick="mostrar(1)">
					            	<div class="method master-card"></div>
					                <input type="radio" name="pago" value="Master-Card"> 
					                </label>
					                <label class="btn paymentMethod" onclick="mostrar(3)">
				            		    <div class="method oxxo"></div>
					                   <input type="radio" name="pago" value="OXXO">
					                </label>					             					         
					            </div>            
						    </div>
						    <div id="tar1" style="display: none">
                                <table id="p_tar">
                                  <tr>
                                       <td colspan="2">
                                          <label for="num">No. Tarjeta: </label>
                                       </td>
                                       <td colspan="2">
                                           <input type="text" name="num" id="num" required pattern="^\d{16}$">
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>
                                          <label for="mm">MM: </label>
                                        </td>
                                        <td>
                                            <input type="number" name="mm" id="mm" max="12" required>
                                        </td>
                                        <td>
                                            <label for="yy">YY: </label>
                                        </td>
                                        <td>
                                            <input type="number" name="yy" id="yy" max="99" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label for="cvv">Codigo CVV: </label>
                                        </td>
                                        <td colspan="2">
                                            <input type="number" name="cvv" id="cvv" max="999" required>
                                        </td>
                                    </tr>   
                                    <tr>
                                        <td>
                                            <label for="namt">Nombre: </label>
                                        </td>
                                        <td>
                                            <input type="text" name="namt" id="namt" required>
                                        </td>
                                        <td>
                                            <label for="app">Apellidos: </label>
                                        </td>
                                        <td>
                                            <input type="text" name="app" id="app" required>
                                        </td>
                                    </tr>
                               </table>
                            </div>
                            <div id="tar2"></div>
                            <div id="tar3"></div>
                        </div>										    
                    </div>
                </div>
            </div>
        </div>    
    </div>
    
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> INFORMACION DE ENVIO</h3>
                <div class="form-group">
                    <label class="control-label">Nombre Completo</label>
                    <input maxlength="70" type="text" name="name" required class="form-control" placeholder="John Doe"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Correo Electronico:</label>
                    <input type="email" name="mail" required class="form-control" placeholder="tu@email.com"  />
                </div>
                <div class="form-group">
                    <label class="control-label">Telefono</label>
                    <input type="tel" maxlength="10" name="cell" class="form-control" placeholder="4491234567" />
                </div>
                <div class="form-group">
                    <label class="control-label">Direccion</label>
                    <input maxlength="200" type="text" name="dir" required class="form-control" placeholder="Calle Dragon #123 Fracc. Fantasias" />
                </div>
                <div class="form-group">
                    <label class="control-label">Codigo Postal</label>
                    <input maxlength="5" type="number" name="cp" required class="form-control" placeholder="90073" />
                </div>
                <div class="form-group">
                    <label class="control-label">Ciudad</label>
                    <input maxlength="30" type="text" required name="cy" class="form-control" placeholder="Los Angeles" />
                </div>
                <div class="form-group">
                    <label class="control-label">Pais</label>
                    <select name="pais" id="paises" class="paises" onchange="myFunction()" data-stotal="<?php echo $stotal; ?>">
                               <option value="Mexico">Mexico</option>
                               <option value="EUA">EUA</option>
                           </select>
                </div>
                
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Confirmar</h3>
                <h2>Compras: $ <?php echo $stotal?> MX</h2>
               <h3 id="iva-tax">Impuestos: $ <?php echo $imp ?> MX</h3>
               <h4 id="envio">Envio:
               <select name="tenvio" id="tenvio" onchange="camenvio()">
                   <option value="gratis">Gratis ($ 0.00)</option>
                   <option value="express">Express (+$ <?php echo ($stotal*.02)?>)</option>
               </select></h4>
                <?php
                    $total = $stotal + $imp + $envio;
                ?>
                <h2 id="total" style="display: inline;">Total: $ <label id="tt" style="display: inline;"><?php echo $total?></label> MX</h2>
                <br>
                <br> 
                <label class="control-label">¿CODIGO DE DESCUENTO?</label>
                    <input maxlength="10" type="text" id="desc" name="cupon" class="form-control" placeholder="Subscribete para obtenerlos" />
                    <a onclick="cupon()" class="btn bg-danger text-white">Comprobar Cupon</a><br><br>
                <button class="btn btn-success btn-lg pull-right" type="submit">Aceptar</button>
            </div>
        </div>
    </div>
</form>
</div>

 <script>
     function cupon(){
         
         var cup = document.getElementById("desc").value;
         if(cup == "REMLOSUMIP"){
             swal("Comprobado", "10% en tu total", "success");
             
         }
         else if(cup == "IPSUMLOREM"){
             swal("Comprobado", "15% en tu total", "success");
         }
         else if(cup == "MUSPIMEROL"){
             swal("Comprobado", "5% en tu total", "success");
         }
         else{
             swal("ERROR", "Cupon no valido", "error");
         }
     }
  function mostrar(num){
      
      document.getElementById("tar"+num).style.display = "block";
      
      if(num==1){
            document.getElementById("num").setAttribute('required');
            document.getElementById("mm").setAttribute('required');
            document.getElementById("yy").setttribute('required');
            document.getElementById("cvv").setAttribute('required');
            document.getElementById("namt").setAttribute('required');
            document.getElementById("app").setAttribute('required');
            document.getElementById("tar2").style.display = "none";
            document.getElementById("tar3").style.display = "none";
      }
      if(num==3){
            document.getElementById("num").removeAttribute('required');
            document.getElementById("mm").removeAttribute('required');
            document.getElementById("yy").removeAttribute('required');
            document.getElementById("cvv").removeAttribute('required');
            document.getElementById("namt").removeAttribute('required');
            document.getElementById("app").removeAttribute('required');
          
            document.getElementById("tar2").style.display = "none";
            document.getElementById("tar1").style.display = "none";
      }
  }   
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>
    function myFunction() {
        var x = document.getElementById("paises").value;
        var ax = <?php echo $stotal;?>;        
        var imp;
        var total;
        if(x == 'Mexico'){  
            imp = ax*0.16;
            document.getElementById("iva-tax").innerHTML = "Impuestos: $ " + imp + ".00 MX";
        }
        else if(x == 'EUA'){            
            imp = ((ax/20)*0.06)*20;
            document.getElementById('iva-tax').innerHTML = 'Impuestos: $ '+imp + ".00 MX"; 
        }
        total = ax+imp;
        document.getElementById("total").innerHTML = "Total : $ " + total+".00 MX";
    }
    function camenvio(){
        var envios = document.getElementById("tenvio").value;
        var ax = <?php echo $stotal;?>;        
        var en;
        var total;
        if(envios == 'gratis'){
            en = 0;
        }
        else if(envios == 'express'){
            en = ax*.02;
        }
        total = ax+en;
    }
</script>

</body>
</html>