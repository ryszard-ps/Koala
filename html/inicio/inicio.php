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
                      $vdp = ($vd > 0) ? ($total/$vd)*100 : $vd ;
                      echo $vdp, " %";
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
                <i class="fa  fa-star-half fa-4x">
                </i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="small">
                  <h2>
                    <?php
                      $vod = $estadistica->archivosVistosODescargados($rfc,$tmp_permiso);
                      $vodp = ($vod > 0) ? ($total/$vod)*100 : $vod ;
                      echo $vodp, " %";
                   ?>
                  </h2>
                </div>
                <div>Vistos o Descargas</div>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer">
              <span class="pull-left">Total</span>
              <span class="pull-right"><?php echo $vod; ?>
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
                <i class="fa fa-star-o fa-4x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="small">
                  <h2>
                    <?php
                      $sa = $estadistica->archivosSinAcciones($rfc,$tmp_permiso);
                      $sap = ($sa > 0) ? ($total/$sa)*100 : $sa ;
                      echo $sap, " %";
                    ?>
                  </h2>
                </div>
                <div>Sin Acciones</div>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer">
              <span class="pull-left">Total</span>
              <span class="pull-right"><?php echo $sa; ?>
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
