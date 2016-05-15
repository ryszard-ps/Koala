<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Cargar Archivos</h1>
    </div>
  </div>
  <div class="row">
    <form method="POST" enctype="multipart/form-data" action="?vista=renombrararchivos">
      <input type="hidden" name="MAX_FILE_SIZE" value="15360" />
      <input type="file"  name="files[]"id="archivo" multiple>
      </br>
      <div class="" id="_ajax_xml_subir">
        <input  class="btn btn-big btn-success" type="button" value="Cargar archivos" onclick="validarArchivos()"/>
      </div>
    </form>
  </div>
  </br>
  <div class="panel-heading" id="_ajax_xml_esperando">

  </div>
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">Archivos validos</h3>
    </div>
    <div class="panel-body">
      <div class="row" id="_ajax_xml_success">
      </div>
    </div>
  </div>
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h3 class="panel-title">Archivos no validos</h3>
    </div>
    <div class="panel-body">
      <div class="row" id="_ajax_xml_danger">

      </div>
    </div>
  </div>
</div>
<script src="vistas/js/validarArchivos.js"></script>
