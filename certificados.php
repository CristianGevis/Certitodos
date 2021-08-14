<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/admin.js" type="text/javascript"></script>
    <script src="./js/generarcertificados.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/estilo_registro.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Certificados | ACFO</title>
</head>

<body>
    <h1 class="container__title">Requisitos para aceder a su certificado</h1>
    <section class="container___main--information">
        <h2 class="container__main--information-items"><img src="imagenes/chek.png" />Usted debe haber asistido al evento </h2>
        <h2 class="container__main--information-items"><img src="imagenes/chek.png" />La fecha del evento ya debe haber pasado </h2>
        <h2 class="container__main--information-items"><img src="imagenes/chek.png" />Ingrese el número de identificación como lo ingreso al registrarse </h2>
        <h2 class="container__main--information-items"><img src="imagenes/chek.png" />Puede descargar sus certificados desde el año 2013 hasta la fecha </h2>
        <h2 class="container__main--information-items"><img src="imagenes/chek.png" />Recuerde que solo podra descargar UNA SOLA VEZ (1) el Certificado por Evento</h2>
    </section>
    <form class="container__form" action="verifica_descarga.php" method="POST" id="formulario" name="formulario">
        <h1 class="container__form--title">Ingrese sus datos</h1>
        <label class="cotainer__form--titleinput"> Ingrese número de Identificación</label>
        <input class="container__form--input" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="identi" placeholder="Numero de documento" />
        <label class="cotainer__form--titleinput">Seleccione un Evento</label>
        <select class="container__form--list" name="congreso" id="selector">
            <?php
            $resul_congre = mysqli_query($conex, "SELECT idcongreso, nombrecongreso FROM congresos WHERE publicado=1 ORDER BY idcongreso ASC");
            while ($fila = mysqli_fetch_array($resul_congre)) {
            ?>
                <option value='<?php echo $fila['idcongreso'] ?>'><?php echo $fila['nombrecongreso'] ?></option>
            <?php
            }
            ?>
        </select>       
        <button class="container__form--button" type="button" id="boton" onClick="validar()">Ir al certificado</button>
        <div class="container__loginAdmin">
            <a class="container__loginAdmin--submit" href="logini.php">Iniciar Sesion</a>
            <!--<a style="display:bloc" href="../congresos/logini1.php">Inscritos</a>-->
        </div>
    </form>
    <section>
    </section>
</body>

</html>