<?php
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='prendas';
	
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
        die('Error en la conexion');
    }
    //FIN DE CONEXION
	
    $sqlsud = "SELECT SUM(`cantidad_p`) as Cant FROM `ventas` WHERE `tipo`='playera'";
    $sud = $conexion->query($sqlsud);
    $sud = $sud->fetch_assoc();
    //echo "Computadoras: ".$sud['Cant']."<br>";
    
    $sqlplay = "SELECT SUM(`cantidad_p`) as Cant FROM `ventas` WHERE `tipo`='sudadera'";
    $play = $conexion->query($sqlplay);
    $play = $play->fetch_assoc();
//    echo "Laptops: ".$play['Cant']."<br>";

        ?> 
           
        
<!DOCTYPE html>
<html>
  <head>
  <style>
      
      body{
          background-image: url(media/fondo2.jpg);
      }
      </style>
  </head>
  <body>
   
   
    
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
          
        var data = google.visualization.arrayToDataTable([
          ['Producto', 'Porcentaje de ventas'],
          ['Sudaderas',     <?php echo $sud['Cant'];   ?>],
          ['Playeras',      <?php echo $play['Cant'];   ?>]
        ]);
          
        

        var options = {
          title: 'Ventas de productos',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>



?>