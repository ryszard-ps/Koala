function iniciarAutenticacion() {
  var conexion, formulario, respuesta, resultado, clave, usuario, sesion;
  usuario = __('usuario').value;
  clave = __('clave').value;
  sesion = __('clave').checked ? true : false;

  formulario = 'usuario=' + usuario + '&clave=' + clave +'&sesion=' + sesion;
  conexion = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  conexion.onreadystatechange = function(){
    if (conexion.readyState == 4 && conexion.status == 200) {
      if (conexion.responseText == 1) {
        resultado = '<div class="alert alert-success alert-dismissible" role="alert">';
        resultado += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        resultado += '<span aria-hidden="true">&times;</span></button>';
        resultado += '<strong>Bienvenido!!!</strong> </div>';
      __('_ajax_autenticacion').innerHTML = resultado;

        location.reload();
      } else {
        __('_ajax_autenticacion').innerHTML = conexion.responseText;
      }

    } else  if(conexion.readyState != 4){
        resultado = '<div class="alert alert-info alert-dismissible" role="alert">';
        resultado += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        resultado += '<span aria-hidden="true">&times;</span></button>';
        resultado += '<strong>Te estamos autentificando!!!</strong> </div>';
      __('_ajax_autenticacion').innerHTML = resultado;
    }
  }
  conexion.open('POST', 'ajax.php?tipo=autenticacion', true);
  conexion.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  conexion.send(formulario);
}
function scriptAutenticacion(e) {
  if (e.keyCode == 13) {
    iniciarAutenticacion();
  }
}
