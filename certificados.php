<?php
error_reporting( 0 );
include("conexion.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Certificados</title>
<link rel="stylesheet" type="text/css"href="css/estilo_registro.css"/>

<script language="javascript">

function validar(){
	
if(document.formulario.identi.value=="" )

{	
alert("Por favor ingrese el número de identificación");

}else 
	{
	document.getElementById("formulario").submit();
	document.formulario.identi.value="";			
	document.formulario.identi.focus();
	//user=document.formulario.user.value
	//window.open("impresion/imprimir.php?user="+user);		
	}
}

function inicio() {
			document.formulario.identi.value="";			
			document.formulario.identi.focus();
		}

</script>

</head>

<body onload=inicio()>

<div class="frm">     


<div style="margin-top:50px;" >
   
      <div class="cont">
      <p >Requisitos para aceder a su certificado</p><br />
      </div>
      
     <div  style="width:700px; margin-left:auto; margin-right:auto;">
     <p style="font-size:16px; color:#333; text-align:left;"><img src="imagenes/chek.png" />Usted debe haber asistido al evento </p>
     
     <p style="font-size:16px; color:#333; text-align:left;"><img src="imagenes/chek.png" />La fecha del evento ya debe haber pasado   </p>
     
     <p style="font-size:16px; color:#333; text-align:left;"><img src="imagenes/chek.png" />ingrese el número de identificación como lo ingreso al registrarse   </p>
     
     </div>
     
     <p style="font-size:16px; color:#8F0305; text-align:center;  font-weight:bold;"><br />Puede descargar sus certificados desde el año 2013 hasta la fecha </p>
     <p style="font-size:16px; color:#3356A7; text-align:center;  font-weight:bold;"><br />Recuerde que solo podra descargar UNA SOLA VEZ (1) el Certificado por Evento</p><br />
     
     
    <form action="verifica_descarga.php" method="POST" id="formulario" name="formulario" >
            
            <table aling="center" width="500 px"> 
            	<tr>
                	<td> 
                     <span class="etiqueta"> Número de Identificación: </span> </BR>
                     <span style="color:RED; font-size:14px;"> (sin puntos, comas, ni letras) </span>
                    </td>
                    
                    <td> 
                    	<input type="text" name="identi" class="campo" style="margin:0 0 0 10px;"/>
                    </td>
                </tr>                
               
                
                <tr>
                	<td> 
                    	<span class="etiqueta">Seleccione el Evento: </span>	
                    </td>
                    
                    <td> 
                    	<select name="congreso" id="selector" style="margin:0 0 0 10px;	">
                	
                    <?php 


                    $resul_congre = mysqli_query($conex,"SELECT idcongreso, nombrecongreso FROM congresos WHERE publicado=1 ORDER BY idcongreso ASC");					
									
					while ($fila=mysqli_fetch_array($resul_congre))					
					{
						?>
                        <option value="<?php echo $fila['idcongreso']?>"><?php echo $fila['nombrecongreso']?>s </option>
                        <?php
					}
					?>
                    
                </select>     
                    </td>
                </tr>
            
            </table>
           
    <div align="center"> <br />
   <button type="button" id="boton"  onClick="validar()" >Ir al certificado</button> <br />
    </div>
	</form>

<div style="text-align:center"  >    
 <a href="logini.php" style="text-decoration:none; color:#E0E0E0;">Certificados</a>   &nbsp;&nbsp;  

 <a href="../congresos/logini1.php" style="text-decoration:none; color:#E0E0E0;">Inscritos</a>  
</div>

 </div>
 
</body>
</html>
