<?php
//error_reporting(0);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logueo</title>
<link rel="stylesheet" type="text/css"href="css/usuario.css"/>

<script language="javascript">

function validar(){
	
if(document.formulario.user.value=="" || document.formulario.pass.value=="")

{	
alert("Por favor ingrese los dos datos");

}else 
	{
	document.getElementById("formulario").submit();
	}
}


</script>

</head>

<body>


<div class="frm">
       

<div class="cont2" style="color:#FFF; font-size:16px; padding-top:10px">Para uso exclusivo de ACFO </div>


<table width="520" border="0" align="center" class="tabla">

    
  <tr>
    <td>&nbsp;</td>
    
    
    <td width="314">
    <div class="user2"> 
    <form action="login.php" method="POST" id="formulario" name="formulario">
            Usuario: <input type="text" name="user" class="caja"/><br /><br />
            Password: <input type="password" name="pass" class="caja" /><br />
    </div>
    </td>
    
    <td colspan="4" align="center"><button type="button" id="boton"  onClick="validar()">Aceptar</button>
  </tr>
  
  
  <tr>    							    
   
	</form></td>
  </tr>
  
  <tr>
    <td colspan="4"></td>
  </tr>
  
  
</table>


</div> 
</body>
</html>
