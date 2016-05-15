function validarArchivos() {
  var conexion, formulario, respuesta, resultado, archivos;
  var x = document.getElementById("archivo");
  var valido='';
  var noValido='';
  var boton='';
  var txt = "";
  if ('files' in x) {
    if (x.files.length == 0) {
      esperando = '<div class="alert alert-warning alert-dismissible" role="alert">';
      esperando += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      esperando += '<strong>Error</strong> No se a seleccionado ningún archivo.</div>';
      __('_ajax_xml_esperando').innerHTML = esperando;
    } else {
      contador=0;
      for (var i = 0; i < x.files.length; i++) {
        var file = x.files[i];
        if (file.type=="text/xml") {
          contador = contador+1;
          valido +='<div class="col-sm-6 col-md-4">';
          valido +='<div class="thumbnail alert-success">';
          valido +='<div class="row ">';
          valido +='<div class="col-xs-2">';
          valido +='<i class="fa fa-code fa-4x"></i>';
          valido +='</div>';
          valido +='<div class="col-xs-10 text-right">';
          valido +='<div class="small"><h3>';
          valido += file.name;
          valido +='</h3></div>';
          valido +='<div>';
          valido +='<dl>';
          valido +='<dt>No.';
          valido += i+1;
          valido += '</dt>';
          valido +='<dt>Tamaño: ';
          valido += file.size;
          valido +=' Bytes</dt>';
          valido +='<dt>Archivo Valido </dt>';
          valido +='</dl>';
          valido +='</div>';
          valido +='</div>';
          valido +='</div>';
          valido +='</div>';
          valido +='</div>';
        } else {
          noValido +='<div class="col-sm-6 col-md-4 ">';
          noValido +='<div class="thumbnail alert-danger">';
          noValido +='<div class="row">';
          noValido +='<div class="col-xs-2">';
          noValido +='<i class="fa fa-code fa-4x"></i>';
          noValido +='</div>';
          noValido +='<div class="col-xs-10 text-right">';
          noValido +='<div class="small"><h3>';
          noValido += file.name;
          noValido +='</h3></div>';
          noValido +='<div>';
          noValido +='<dl>';
          noValido +='<dt>No.';
          noValido += i+1;
          noValido += '</dt>';
          noValido +='<dt>Tamaño: ';
          noValido += file.size;
          noValido +=' Bytes</dt>';
          noValido +='<dt>Archivo No Valido </dt>';
          noValido +='</dl>';
          noValido +='</div>';
          noValido +='</div>';
          noValido +='</div>';
          noValido +='</div>';
          noValido +='</div>';
        }
      }
      if(contador==0){
        boton='<input  class="btn btn-big btn-success" type="button" value="Cargar archivos" onclick="validarArchivos()"/>';
      } else {
        boton='<input  class="btn btn-big btn-info" type="submit" value="Subir archivos"/>';
      }
    __('_ajax_xml_success').innerHTML = valido;
    __('_ajax_xml_danger').innerHTML = noValido;
    __('_ajax_xml_subir').innerHTML = boton;
    }
  }
}
