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
