function verArchivo() {
  var conexion, formulario, respuesta, resultado, archivos;
  var xml = document.getElementById('xml');
  var contenido = xml.innerHTML;
  var boton = document.getElementById('visto');
  var estado= boton.innerHTML;
  formulario = 'contenido=' + contenido + '&estado=' + estado;
  if(estado!='Visto'){
    conexion = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    conexion.onreadystatechange = function(){
      if (conexion.readyState == 4 && conexion.status == 200) {
        if (conexion.responseText == 1) {
        } else {
        }
      } else  if(conexion.readyState != 4){
      }
    }
    conexion.open('POST', 'ajax.php?tipo=activarvisto', true);
    conexion.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    conexion.send(formulario);
  }
}
