<?php
//error_reporting( 0 );
include("conexion.php");



	$rst_clien=mysqli_query($conex, "SELECT * FROM participantes WHERE id=".$_REQUEST["cod"].";");
	$fila_clien=mysqli_fetch_array($rst_clien);
	
  $evento = $_REQUEST["eve"];
  $codevento = $_REQUEST["eve2"];
  //echo "$codevento";
	
?>
		
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript">

function validar(form){
		
	if(form.nombre.value.length<1)
	   {	
		alert("El campo Nombre no puede estar vacio");
		form.nombre.focus()
		return false;
	   }
	   
	if(form.numidentificacion.value.length<1)
	   {	
		alert("El campo identificación no puede estar vacio");
		form.numidentificacion.focus()
		return false;
	   }
	  
	 
	 if(form.descarga.value>1)
	   {	
		alert("El valor para el campo descarga es 0  o  1");
		form.descarga.focus()
		return false;
	   }   
	 
	   
	   
   form.submit();  
}
			


</script>



<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="css/estilo_registro.css"/>



</head>

<body>


<div class="frm">       
        <form action="modifica_guardar.php?cod=<?php echo $_REQUEST["cod"];?>" method="post" enctype="multipart/form-data" name="frm" class="formulario" >
            
  <div id="stylized" >    
      <p> <span style="font-weight:bold; color:#036" >MODIFICAR PARTICIPANTE </span></p>
      <p> <span style="font-weight:bold; color:#036" ><?php echo "$evento"; ?> </span></p>
  </div>
  <BR /><BR />
  
  
   <span  >
   		
        	<table>
            <tr>
            <td>
            <div class="campo">
                        <label for= "nombre">Nombre: </label>
                        <input name="nombre" type="text" id="nombre" value="<?php echo $fila_clien["nombre"] ?>"  />                        
                    </div>  
            </td>
            <td>
             <div class="campo">
                   	   <label for= "numidentificacion">No. Identificación:</label>
                       <input name="numidentificacion" type="text"  value="<?php echo $fila_clien["identi"] ?>"/> 
                       
                       <input name="codevento"  id="codevento" value="<?php echo $codevento?>" type="hidden">
                    </div> 
            </td>
            </tr>
            <tr>
            <td colspan="2" align="center">
              <div class="campo" > <br /> <br />
                <label for= "descarga" style="width:600px; text-align:center" >Estado de Descarga: [1= descargado  0= sin descargar]</label>
                <input name="descarga" type="text"  value="<?php echo $fila_clien["descarga"] ?>" style="text-align:center"/> 
                </div> 
            </td>
            </tr>
            </table>
        
           
 </span> 
 
 <br clear="all" />
 <hr > 
 
 				<div align="center" > 
      <button type="button" id="boton" onclick="window.location.href='admin.php'">Cancelar</button>
      <button type="button" id="boton" onclick="validar(this.form)">Actualizar</button>
      
 				 </div>                
                
                
                 <div class="spacer"></div>
        
        </form>
</div> 
</body>
</html>

