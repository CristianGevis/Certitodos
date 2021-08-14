function validar() {
  if (document.formulario.identi.value == "") {
    alert("Por favor ingrese el número de identificación");
  } else {
    document.getElementById("formulario").submit();
    document.formulario.identi.value = "";
  }
}

function inicio() {
  document.formulario.identi.value = "";
}
