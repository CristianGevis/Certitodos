<?php
//error_reporting( 0 );
session_start();
include("conexion.php");

if (!$_SESSION) {
  echo '<script language = javascript>
alert("No tiene permisos para ingresar al sistema")
self.location = "certificados.php"
</script>';
}



// Zebra Pagination
require_once("./Zebra_Pagination-2.2.0/Zebra_Pagination.php");

$resul_prov = mysqli_query($conex, "SELECT * FROM participantes ORDER BY id");
$num_registros = mysqli_num_rows($resul_prov);

$resultados = 18;

$paginacion = new Zebra_Pagination();
$paginacion->records($num_registros);
$paginacion->records_per_page($resultados);
// Quitar ceros en numeros con 1 digito en paginacion
$paginacion->padding(false);

$resul_prov = mysqli_query($conex, "SELECT * FROM participantes ORDER BY id LIMIT " . (($paginacion->get_page() - 1) * $resultados) . ", " . $resultados);


$num_fila = 0;

if ($num_registros == 0) {
  echo "No se han encontrado participantes para mostrar";
}

?>

<!DOCTYPE html">
<html lang="es">

<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel=StyleSheet href="./css/estilolistar.css">
  <Script src="./js/admin.js" type="text/javascript"></Script>
  <title>Administador Certitodos | ACFO</title>
</head>

<body>
  <!---------------------Section Header Menu---------------------------------->
  <header class="container__header">
    <section class="container__header--menutop">
      <span class="container__header--menutop-logo"></span>
      <h1 class="container__header--menutop-title">ACFO</h1>
      <button type="button" class="container__header--menutop-boton" onclick="window.location.href='desconectar.php'"> CERRAR SESION</button>
    </section>

    <ul class="container__header--menubottom-nav">
      <li class="container__header--menubottom-navitems"><a href="#">Tabla Paticipantes</a></li>
      <li class="container__header--menubottom-navitems"><a href="#">Cargar Datos</a></li>
    </ul>

  </header>

  <!-----------------------Section Main----------------------------------------->
  <!--section find in datebase-->
  <main class="container__main1">
    <div class="container__menu">
      <form action="verbuscado_nombre.php" method="post" name="form3" class="container__menu--formulariobuscar" id="form3">
        <label>Buscar Nombre: </label>
        <input name="busca1" id="busca1" type="text" class="container__formulariobuscar--entrada" autofocus />
        <button type="button" class="container__formulariobuscar--botonbuscar" onClick="validar_nombre()"> Buscar</button>
      </form>

      <form action="verbuscado.php" method="post" name="form2" class="container__menu--formulariobuscar" id="form2">
        <label>Buscar Documento: </label>
        <input name="busca" id="busca" type="text" class="container__formulariobuscar--entrada" autofocus />
        <button type="button" class="container__formulariobuscar--botonbuscar" onClick="validar()"> Buscar</button>
      </form>
    </div>
    <!--section print table participantes-->
    <h1 class="container__titletable">TABLA PARTICIPANTES</h1>

    <table class="container__table">
      <tr class="container__table--rows">`
        <td>Nombre</td>
        <td>Identificación</td>
        <td>Evento</td>
        <td>Descarga</td>
        <td>Editar</td>
      </tr>
      <?php
      while ($fila = mysqli_fetch_array($resul_prov)) {
        if ($num_fila % 2 == 0) {
      ?>
          <tr>
            <td class="margentexto"><?php echo $fila['nombre']; ?></td>
            <td class="margentexto"><?php echo $fila['identi']; ?></td>
            <td class="margentexto">
              <?php
              $resul_congre = mysqli_query($conex, "SELECT idcongreso, nombrecongreso FROM congresos WHERE publicado=1 ORDER BY idcongreso ASC");
              while ($fila1 = mysqli_fetch_row($resul_congre)) {
                if ($fila1['0'] == $fila['congreso']) {
                  echo $fila1['1'];
                  $eve1 =  $fila1['1'];
                }
              }
              ?>
            </td>

            <td><?php echo $fila['descarga']; ?></td>
            </td>
            <td><a class="Ntooltip" href="modifica.php?cod=<?php echo $fila['id']; ?>&eve=<?php echo $eve1; ?>"><img src="imagenes/editar.png" style="border:none" /><span>Editar</span></a></td>
          </tr>
        <?php
        } else {
        ?>
          <tr>
            <td class="margentexto"><?php echo $fila['nombre']; ?></td=>
            <td class="margentexto"><?php echo $fila['identi']; ?></td>
            <td class="margentexto">
              <?php
              $resul_congre = mysqli_query($conex, "SELECT idcongreso, nombrecongreso FROM congresos WHERE publicado=1 ORDER BY idcongreso ASC");
              while ($fila1 = mysqli_fetch_row($resul_congre)) {
                if ($fila1['0'] == $fila['congreso']) {
                  echo $fila1['1'];
                  $eve1 =  $fila1['1'];
                }
              }
              ?>

            </td>
            <td class="margentexto"><?php echo $fila['descarga']; ?></td>

            </td>
            <td><a class="Ntooltip" href="modifica.php?cod=<?php echo $fila['id']; ?>&eve=<?php echo $eve1; ?>"><img src="imagenes/editar.png" style="border:none" /><span>Editar</span></a></td>
          </tr>
        <?php
        }
        ?>
      <?php
        //aumentamos en uno el número de filas 
        $num_fila++;
      }
      ?>
    </table>


    <table>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><?php $paginacion->render(); ?></td>
      </tr>
    </table>
    </div>
  </main>

  <main class="container__main--cargaparticipantes">
    <h1>CARGAR DATOS PARTICIPANTES</h1>
    <H2>Esta area es para realizar la carga de los participantes masivamente</H2>
    <p>Por favor ingrese el archivo que contiene los datos de los participantes a cargar.</p>
  </main>

  <main class="containes__main--cargaeventos">
    <h1>CARGAR DATOS EVENTO NUEVO</h1>
  </main>

</body>

</html>