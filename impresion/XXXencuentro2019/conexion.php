<?php
$conex = mysql_connect("localhost", "acfoeduc_certito", "(f1TS!I]fnNa")
		or die("No se pudo realizar la conexion");
	mysql_select_db("acfoeduc_certitodos",$conex)
		or die("ERROR con la base de datos");
?>