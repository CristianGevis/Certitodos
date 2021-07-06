<?php
//error_reporting( 0 );
include("conexion.php");


$identi = $_POST["identi"];
$congreso = $_POST["congreso"];

//echo "$identi";
//echo "$congreso";
$sql = mysqli_query($conex,"SELECT * FROM participantes WHERE identi='$identi' and congreso='$congreso'");
$numero = mysqli_num_rows($sql);
$eve = mysqli_query($conex,"SELECT nombrecongreso FROM congresos WHERE idcongreso='$congreso'");
$fila=mysqli_fetch_array($eve);
$descarga=mysqli_query($conex, "SELECT descarga FROM participantes WHERE identi='$identi' and congreso='$congreso'");
$download=mysqli_fetch_array($descarga);

if($numero>0){
    
    if ($download['descarga'] =="1")
    {
	    echo '<script language = javascript>
	    alert("Su certificado del evento '.$fila["nombrecongreso"].' ya fue descargado")
	    self.location = "certificados.php"	
	    </script>';
    }
}else{
  echo '<script language = javascript>
	alert("Número de documento no encontrado en el evento '.$fila["nombrecongreso"].' ")
	self.location = "certificados.php"
	</script>';
}


//$rst_clien=mysql_query("SELECT * FROM participantes WHERE id=".$_POST["user"].";",$conex);
//$fila_clien=mysql_fetch_array($rst_clien);

//$eve = mysqli_query($conex,"SELECT * FROM congresos WHERE nombrecongreso='$congreso'");
//$evento=mysqli_free_result($eve,0,"nombrecongreso");

	/**if ($numero<1) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{
	echo '<script language = javascript>
	alert("Número de documento no encontrado en el evento '.$evento.' ")
	self.location = "certificados.php"
	</script>';
}

if ($descarga ==1) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{
	echo '<script language = javascript>
	alert("Su certificado del evento '.$evento.' ya fue descargado")
	self.location = "certificados.php"	
	</script>';
}
*/
//$cod=$_POST["user"];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/estiloconfirma.css"/>
<title>Confirmar Eliminación</title>

</head>

<body>
<div class="frm" >
<table width="420" border="0" align="center" class="tabla">
  
  <tr>
    <td height="40" class="titulo">¡ ATENCION !</td>
  </tr>
  
  <tr>
    <td height="50" style="background:#FFF; color:#3356A7; text-align:center; font-size:16px">Solo podrá visualizar su certificado una vez por este medio</td>
  </tr>
  
  <tr>
    <td height="90" class="info">Si está seguro que desea guardar o imprimir su certificado en este momento haga clic en ACEPTAR.<br /><br />Si prefiere hacerlo en otro momento haga clic en CANCELAR.
</td>
  </tr>
  
</table>   
		<br/>
  
    <div align="center">
    <form action="switch.php" method="post">
    <input name="cod"  id="cod" value="<?php echo $identi?>" type="hidden">
    <input name="even"  id="even" value="<?php echo $congreso?>" type="hidden">
    
    <button type="submit" id="boton" >Aceptar</button>
    <button type="button" id="boton" onClick="window.location.href='certificados.php'">Cancelar</button>
    
    </form>
    
    </div>
    
  
</div>
</body>
</html>
