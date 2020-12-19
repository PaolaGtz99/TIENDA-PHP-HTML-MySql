<?php
            $servidor='localhost';
            $cuenta='root';
            $password='';
            $bd='principal';
            
            $conexion = new mysqli($servidor,$cuenta,$password,$bd);

            if ($conexion->connect_errno){
                    die('Error en la conexion');
                }

            $sql= 'SELECT * FROM registros';
         ?>
          <?php   
            $resultado = $conexion -> query($sql); //aplicamos sentencia   
            while( $fila = $resultado -> fetch_assoc() ){ //recorremos los registro
        ?>
          [<?php echo $fila['nombre'];    ?>,   <?php echo $fila['ventas']; ?>],
            <?php  
            }
        $resultado->data_seek(0);
        $row1 = $resultado->fetch_row();
        $resultado->data_seek(1);
        $row2 = $resultado->fetch_row();
        $resultado->data_seek(2);
        $row3 = $resultado->fetch_row();
        $resultado->data_seek(3);
        $row4 = $resultado->fetch_row();
        $resultado->data_seek(4);
        $row5 = $resultado->fetch_row();
        ?> 
           
        
<!DOCTYPE html>
<html>
  <head>
   
  </head>
  <body>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
          
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['<?php echo $row1[1];   ?>',     <?php echo $row1[4];   ?>],
          ['<?php echo $row2[1];   ?>',      <?php echo $row2[4];   ?>],
          ['<?php echo $row3[1];   ?>',  <?php echo $row3[4];   ?>],
          ['<?php echo $row4[1];   ?>', <?php echo $row4[4];   ?>],
          ['<?php echo $row5[1];   ?>',    <?php echo $row5[4];   ?>]
            
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