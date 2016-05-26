function buscarArchivos() {
  var conexion, formulario, respuesta, resultado, palabra;
  palabra = __('buscar').value;

  formulario = 'palabra=' + palabra;
  conexion = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  conexion.onreadystatechange = function(){
    if (conexion.readyState == 4 && conexion.status == 200) {
      __('_ajax_xml_success').innerHTML = conexion.responseText;

    } else  if(conexion.readyState != 4){
        resultado = '<div class="alert alert-info alert-dismissible" role="alert">';
        resultado += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        resultado += '<span aria-hidden="true">&times;</span></button>';
        resultado += '<strong>Procesando tu solicitud, espera un momento!!!</strong> </div>';
      __('_ajax_xml_success').innerHTML = resultado;
    }
  }
  conexion.open('POST', 'ajax.php?tipo=buscararchivos', true);
  conexion.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  conexion.send(formulario);
}
