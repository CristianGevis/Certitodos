function validar() {
  if (document.getElementById("busca").value == "") {
    alert("Por favor escriba la cedula que desea buscar..!");
  } else {
    document.getElementById("form2").submit();
  }
}

function validar_nombre() {
  if (document.getElementById("busca1").value == "") {
    alert("Por favor escriba el nombre que desea buscar..!");
  } else {
    document.getElementById("form3").submit();
  }
}

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