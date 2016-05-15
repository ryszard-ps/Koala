<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Ver Archivos </h1>
    </div>
  </div>
  </br>
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Archivos XML de nómina</h3>
    </div>
    <div class="panel-body">
      <div class="row " id="_ajax_xml_success">
      <?php
        $verXML = new MostrarArchivos();
        $verXML->verArchivos($rfc, $tmp_permiso);
      ?>
      </div>
    </div>
  </div>
</div>
<script src="vistas/js/movimientosArchivos.js"></script>
