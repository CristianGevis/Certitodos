<?php

$server="localhost";
$user="root";
$pass="";
$db="acfoeduc_certitodos";
$conex = new mysqli($server,$user,$pass,$db);
if($conex->connect_errno){
	die("La conexion ha fallado" . $conex->connect_errno);
} else{
	
}
?>