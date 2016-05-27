function verArchivo(contador) {
  var conexion, formulario, respuesta, resultado, archivos;
  str0="";
  var xmlv =str0.concat("xml",contador);
  var xml = document.getElementById(xmlv);
  var contenido = xml.innerHTML;
  var str1="";
  var elementos=str1.concat("visto",contador);
  var boton = document.getElementById(elementos);
  var estado = boton.innerHTML;
  formulario = 'contenido=' + contenido;
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
