<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Ver Archivos </h1>
    </div>
  </div>

  <form role="form">
    <div class="row">
      <div class="col-lg-8">
        <div class="input-group">
          <input type="text" class="form-control" id="buscar">
          <span class="input-group-btn">
            <button class="btn btn-success" type="button" onclick="buscarArchivos()">Buscar</button>
          </span>
        </div>
      </div>
    </div>
  </form>
  </br>

  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Archivos XML de nómina</h3>
    </div>

    <div class="panel-body">

      <div class="row " id="_ajax_xml_success">
      <?php
        $parametro="Nada";
        $peticion=0;
        $verXML = new MostrarArchivos();
        $verXML->verArchivos($rfc, $tmp_permiso, $parametro, $peticion);
      ?>
      </div>
    </div>
  </div>
</div>
<script src="vistas/js/movimientosArchivos.js"></script>
<script src="vistas/js/buscarArchivos.js"></script>
