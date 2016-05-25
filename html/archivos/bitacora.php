<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Reportes de Archivos </h1>
      <?php require(HTML_DIR.'archivos/reportes.php'); ?>
  </div>
</div>
</br>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Estado de los ultimos archivos</h3>
  </div>

  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th class="text-center">RFC</th>
          <th class="text-center">XML</th>
          <th class="text-center">Fecha de Pago</th>
          <th class="text-center">Visto</th>
          <th class="text-center">Descargado</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $bitacora = new Bitacora();
        $bitacora->mostrarBitacora($rfc,$tmp_permiso,1);
        ?>
      </tbody>
    </table>
  </div>
</div>
