<?php
	include "db.php";
    session_start();
	///consultamos a la base
    $nombre = $_SESSION["user"];
        $consulta = "SELECT * FROM $nombre ORDER BY id ASC";
	$ejecutar = $conexion->query($consulta); 
    $sql = "CREATE TABLE `chatapp`.`$nombre` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `nombre` VARCHAR(30) NOT NULL , `mensaje` VARCHAR(255) NOT NULL , `fecha` TIMESTAMP NOT NULL , PRIMARY KEY (`id`))";
    $conexion->query($sql);

    while($fila = $ejecutar->fetch_array()) : 
?>
	<div id="datos-chat">
		<span style="color: #1C62C4;"><?php echo $fila['nombre']; ?></span>
		<span style="color: #848484;"><?php echo $fila['mensaje']; ?></span>
		<span style="float: right;"><?php echo formatearFecha($fila['fecha']); ?></span>
	</div>
	
	<?php endwhile;
    ?>
    