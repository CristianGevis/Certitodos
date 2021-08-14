<?php
include("conexion.php");
$identi = $_POST["identi"];
$congreso = $_POST["congreso"];
$sql = mysqli_query($conex, "SELECT * FROM participantes WHERE identi='$identi' and congreso='$congreso'");
$numero = mysqli_num_rows($sql);
$eve = mysqli_query($conex, "SELECT nombrecongreso FROM congresos WHERE idcongreso='$congreso'");
$fila = mysqli_fetch_array($eve);
$descarga = mysqli_query($conex, "SELECT descarga FROM participantes WHERE identi='$identi' and congreso='$congreso'");
$download = mysqli_fetch_array($descarga);

if ($numero != 0) {

  if ($download['descarga'] == "1") {
    echo '<script language = javascript>
	    alert("Su certificado del evento ' . $fila["nombrecongreso"] . ' ya fue descargado")
	    self.location = "certificados.php"	
	    </script>';
  }
} else {
  echo '<script language = javascript>
	alert("Número de documento no encontrado en el evento ' . $fila["nombrecongreso"] . ' ")
	self.location = "certificados.php"
	</script>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="css/estiloconfirma.css" />
  <title>Confirmacion | ACFO</title>
</head>
<body>  
  <section class="container__principal">
    <h1 class="container__principal--title">¡ ATENCION !</h1>
    <h2 class="container__principal--warnings">Solo podrá visualizar su certificado una vez por este medio.</h2>
    <h2 class="container__principal--warnings">Si está seguro que desea guardar o imprimir su certificado en este momento haga clic en ACEPTAR.</h2>
    <h2 class="container__principal--warnings">Si prefiere hacerlo en otro momento haga clic en CANCELAR.</h2>    
    <form class="container__principal--form" action="switch.php" method="POST">
      <input name="cod" id="cod" value="<?php echo $identi?>" type="hidden">
      <input name="even" id="even" value="<?php echo $congreso?>" type="hidden">
      <button class="container__principal--form-button" type="submit">Aceptar</button>      
      <button class="container__principal--form-button" type="button"onClick="window.location.href='certificados.php'">Cancelar</button>
    </form>
  </section>
</body>
</html>