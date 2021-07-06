<?php

include("conexion.php");
include("./Zebra_Pagination-2.2.0/Zebra_Pagination.php");

session_start();

$comprobar = $_SESSION['SesionAbierta'];

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION || $comprobar !== 2 ){
echo '<script language = javascript>
alert("No tiene permisos para ingresar al sistema")
self.location = "certificados.php"
</script>';
}


// Zebra Pagination
require_once("./Zebra_Pagination-2.2.0/Zebra_Pagination.php");

$busca=$_POST["busca"];


$resul_prov=mysqli_query($conex,"SELECT * FROM participantes WHERE identi LIKE '%".$busca."%'");
$num_registros=mysqli_num_rows($resul_prov);


$resultados=15;		

		$paginacion = new Zebra_Pagination();
		$paginacion->records($num_registros);
		$paginacion->records_per_page($resultados);
		// Quitar ceros en numeros con 1 digito en paginacion
		$paginacion->padding(false);
		
		$resul_prov=mysqli_query($conex, "SELECT * FROM participantes WHERE identi LIKE '%".$busca."%' ORDER BY id LIMIT ". (($paginacion->get_page() - 1) * $resultados) . ", " . $resultados);


$num_fila = 0;

if($num_registros==0)
{
	echo "No se encontraron resultados para esta busqueda";
}
?>
		
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="css/estilolistar.css"/>

</head>

<body >   
            
          </div>
  </div>
<div class="cont1">
    <div id="stylized">
      <table border="0" >
        <tr >
          <td width="430" ><div style="width:330px">
            <p><span style="font-weight:bold; color:#036" >PARTICIPANTES: </span></p>
          </div></td>
          <td width="250">          
          <div style="width:220px; float:right; font-size:12px; background:#ffffff; padding:2px; width:100px; margin-bottom:15px"><button type="button" id="boton" onclick="window.location.href='admin.php'"> Ver Todos</button></div></td>
        </tr>
      </table>
    </div>
    <br />
    <br />
    <br />
    <span >
      <table border="0" align="center" class="info">
        <tr id="cabeza">
          <td >Nombre</td>
          <td >Identificación</td>
          <td >Evento</td>
          <td >Descarga</td>
          <td colspan="3" >Editar</td>
        </tr>
    <?php
                    while ($fila=mysqli_fetch_array($resul_prov))
                    { 
                        if ($num_fila%2==0) {
                  ?>
        <tr>
          <td width="260" bgcolor=#ffffff class="margentexto"><?php echo $fila['nombre'];?></td>
          <td width="140" bgcolor=#ffffff class="margentexto" align="center"><?php echo $fila['identi'];?></td>
           <td width="220" bgcolor=#ffffff class="margentexto">

      <?php 
       $resul_congre = mysqli_query($conex, "SELECT idcongreso, nombrecongreso FROM congresos WHERE publicado=1 ORDER BY idcongreso ASC");           
          while ($fila1=mysqli_fetch_row($resul_congre))          
          {
            if ($fila1['0'] == $fila['congreso']) {
              echo $fila1['1'] ;
              $eve1 =  $fila1['1'] ;
             
            }

            
          }
      ?>

      </td>  
          <td width="55" bgcolor=#ffffff class="margentexto" align="center"><?php echo $fila['descarga'];?></td>
          <td  bgcolor=#ffffff style="border:solid #999 0.5px" align="center" ><a class="Ntooltip" href="modifica.php?cod=<?php echo $fila['id'];?>"><img src ="imagenes/editar.png" style="border:none"/><span>Editar</span></a></td>
        </tr>
        <?php
                     }
                    else{		
                     ?>
        <tr>
          <td width="260" bgcolor=#DDDDDD class="margentexto"><?php echo $fila['nombre'];?></td>
          <td width="140" bgcolor=#DDDDDD class="margentexto" align="center"><?php echo $fila['identi'];?></td>
          <td width="220" bgcolor=#DDDDDD class="margentexto">

      <?php 
       $resul_congre = mysqli_query($conex, "SELECT idcongreso, nombrecongreso FROM congresos WHERE publicado=1 ORDER BY idcongreso ASC");           
          while ($fila1=mysqli_fetch_row($resul_congre))          
          {
            if ($fila1['0'] == $fila['congreso']) {
              echo $fila1['1'] ;
              $eve1 =  $fila1['1'] ;
             
            }

            
          }
      ?>

      </td>
          <td width="55" bgcolor=#DDDDDD class="margentexto" align="center"><?php echo $fila['descarga'];?></td>
          <td  bgcolor=#DDDDDD style="border:solid #999 0.5px" align="center"><a class="Ntooltip" href="modifica.php?cod=<?php echo $fila[id];?>"><img src ="imagenes/editar.png" style="border:none"/><span>Editar</span></a></td>
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
  </span>
    <table width="350" border="0" align="center">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><?php $paginacion->render(); ?></td>
      </tr>
    </table>
</div>
</body>
</html>
