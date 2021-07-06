<?php 
session_start();

if ($_SESSION['nombre'])
{	
	session_destroy();
	echo '<script language = javascript>
	alert("su sesion ha terminado correctamente")
	self.location = "certificados.php"
	</script>';}
else
{
	echo '<script language = javascript>
	alert("No ha iniciado ninguna sesión, por favor regístrese")
	self.location = "admin.php"
	</script>';}
?>





