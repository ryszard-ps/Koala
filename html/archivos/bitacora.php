<!-- /.row -->
<div class="row">
    <!-- /.col-lg-8 -->
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i> Bitacora de Archivos
            </div>

                <div class="container col-lg-12 alert-well">
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
        <!-- /.panel -->

    </div>
    <!-- /.col-lg-4 -->
</div>
<!-- /.row -->
