<?php
include("conexion.php");

mysqli_query($conex,"UPDATE participantes SET nombre='".$_POST["nombre"]."',			
			identi='".$_POST["numidentificacion"]."',
			descarga='".$_POST["descarga"]."'
			WHERE id=".$_REQUEST["cod"].";");


header("Location: admin.php");
mysqli_close($conex);
?>