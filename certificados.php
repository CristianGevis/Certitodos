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
    <div class="fondo">
        <main class="container__main">
            <section class="container__main--title">
                <img class="container__main--logo" src="./imagenes/logo-acfo.png" alt="logo">
                <div class="container__main--text">ÁREA DE CERTIFICADOS</div>
            </section>

            <div class="container__title">REQUISITO PARA ACCEDER AL CERTIFICADO</div>
            <ul class="container___main--information">
                <li class="container__main--information-items">Debe haber asistido al evento.</li>
                <li class="container__main--information-items">La fecha del evento ya debe haber pasado.</li>
                <li class="container__main--information-items">Ingrese el número de identificación sin puntos, espacios ni guiones.</li>
            </ul>
            <div class="container__text--condition">Puede descargar sus certificados desde el año 2013 hasta la fecha</div>
            <div class="container__condition">Recuerde que solo podra desacargar <b>UNA SOLA VEZ (1)</b> el certificado por Evento</div>
            <form class="container__form" action="verifica_descarga.php" method="POST" id="formulario" name="formulario">
                <div class="container__information-cedula">
                    <label class="cotainer__form--titleinput"> Numero de identificacion:</label>
                    <input class="container__form--input" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="identi" placeholder="Ingrese el numero aqui" />
                </div>
                <div class="container__informatrion-evento">
                <label class="cotainer__form--titleinput">Seleccione un Evento:</label>
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
                </div>
                <button class="container__form--button" type="button" id="boton" onClick="validar()">Ir al certificado</button>
                <div class="container__loginAdmin">
                    <a class="container__loginAdmin--submit" href="logini.php">Iniciar Sesion</a>
                    <!--<a style="display:bloc" href="../congresos/logini1.php">Inscritos</a>-->
                </div>
            </form>
            <section>
            </section>
        </main>
    </div>
    </body=>

</html>