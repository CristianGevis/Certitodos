<?php
//error_reporting(0);
include("conexion.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/admin.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/estilo_registro.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Certificados | ACFO</title>
</head>

<body onload=inicio()>
    <section class="container__title">
        <p>Requisitos para aceder a su certificado</p>
    </section>
    <section class="container___main--information">
        <h2 class="container__main--information-items"><img src="imagenes/chek.png" />Usted debe haber asistido al evento </h2>
        <h2 class="container__main--information-items"><img src="imagenes/chek.png" />La fecha del evento ya debe haber pasado </h2>
        <h2 class="container__main--information-items"><img src="imagenes/chek.png" />ingrese el número de identificación como lo ingreso al registrarse </h2>
        <h2 class="container__main--information-items">Puede descargar sus certificados desde el año 2013 hasta la fecha </h2>
        <h2 class="container__main--information-items">Recuerde que solo podra descargar UNA SOLA VEZ (1) el Certificado por Evento</h2>
    </section>
    <form class="container__form" action="verifica_descarga.php" method="POST" id="formulario" name="formulario">
        <label class="cotainer__form--titleinput"> Ingrese número de Identificación</label>
        <input class="container__form--input" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="identi" placeholder="Numero de documento" />
        </br>
        <label class="cotainer__form--titleinput">Seleccione un Evento</label>
        <select class="container__form--list" name="congreso" id="selector">
            <?php
            $resul_congre = mysqli_query($conex, "SELECT idcongreso, nombrecongreso FROM congresos WHERE publicado=1 ORDER BY idcongreso ASC");
            while ($fila = mysqli_fetch_array($resul_congre)) {
            ?>
                <option value="<?php echo $fila['idcongreso'] ?>"><?php echo $fila['nombrecongreso'] ?></option>
            <?php
            }
            ?>
        </select>
        </br>
        <button type="button" id="boton" onClick="validar()">Ir al certificado</button>
    </form>
    <div>
        <a href="logini.php">Certificados</a> &nbsp;&nbsp;
        <a href="../congresos/logini1.php">Inscritos</a>
    </div>   
</body>

</html>