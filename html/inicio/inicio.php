<body>
  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Archivos XML</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-list-alt fa-4x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="small">
                  <h2>
                    <?php
                      $total = $estadistica->archivosTodos($rfc,$tmp_permiso);
                      echo $total;
                   ?>
                  </h2>
                </div>
                <div>Total de archivos</div>
              </div>
            </div>
          </div>
          <a href="?vista=verarchivos">
            <div class="panel-footer">
              <span class="pull-left">Ver Archivos</span>
              <span class="pull-right">
                <i class="fa fa-arrow-circle-right"></i>
              </span>
              <div class="clearfix">
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-star fa-4x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="small">
                  <h2>
                    <?php
                      $vd = $estadistica->archivosVistosDescargados($rfc,$tmp_permiso);
                      $vdp = ($vd > 0) ? ($vd*100)/$total : $vd ;
                      echo round($vdp), " %";
                     ?>
                  </h2>
                </div>
                <div>Vistos y Descargados</div>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer">
              <span class="pull-left">Total</span>
              <span class="pull-right"><?php echo $vd ?>
              </span>
              <div class="clearfix">
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-eye fa-4x">
                </i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="small">
                  <h2>
                    <?php
                      $v = $estadistica->archivosAccion($rfc,$tmp_permiso,"visto");
                      $vp = ($v > 0) ? ($v*100)/$total : $v ;
                      echo round($vp),' %';
                    ?>
                  </h2>
                </div>
                <div>Vistos</div>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer">
              <span class="pull-left">Total</span>
              <span class="pull-right"><?php echo $v; ?>
              </span>
              <div class="clearfix">
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-arrow-circle-o-down fa-4x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="small">
                  <h2>
                    <?php
                      $d = $estadistica->archivosAccion($rfc,$tmp_permiso,"descargado");
                      $dp = ($d > 0) ? ($d*100)/$total : $d ;
                      echo round($dp),' %';
                    ?>
                  </h2>
                </div>
                <div>Descargados</div>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer">
              <span class="pull-left">Total</span>
              <span class="pull-right"><?php echo $d; ?>
              </span>
              <div class="clearfix">
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <?php
      require(HTML_DIR . 'archivos/bitacora.php');
     ?>
  </div>
</body>
