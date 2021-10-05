<?php
error_reporting(0);


//Recibir
$usuario = strip_tags($_POST['user']);
$contrasena = strip_tags($_POST['pass']);

if (!isset($_SESSION)) {
	session_start();
}

if (($usuario == "controlador") and ($contrasena == "honey1949")) {
	$_SESSION['SesionAbierta'] = 2;
	$_SESSION['nombre'] = $usuario;
	header("Location: admin.php");
} else {
	echo '<script language = javascript>
	alert("Usuario o Password errados, por favor verifique.")
	self.location = "logini.php"
	</script>';
}
