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
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-center">Empleado</th>
            <th class="text-center">XML</th>
            <th class="text-center">Fecha de Pago</th>
            <th class="text-center">Visto</th>
            <th class="text-center">Descargado</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $bitacora = new Bitacora();
          $bitacora->mostrarBitacora($rfc,$tmp_permiso);
          ?>
        </tbody>
      </table>
    </div>
  </div>
