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
                    <?php $estadistica->archivosTodos($rfc,$tmp_permiso); ?>
                  </h2>
                </div>
                <div>Ver Todos</div>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer">
              <span class="pull-left">Detalles</span>
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
                    <?php $estadistica->archivosVistosDescargados($rfc,$tmp_permiso); ?>
                  </h2>
                </div>
                <div>Vistos y Descargados</div>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer">
              <span class="pull-left">Detalles</span>
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
                    <?php $estadistica->archivosVistosODescargados($rfc,$tmp_permiso); ?>
                  </h2>
                </div>
                <div>Vistos o Descargas</div>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer">
              <span class="pull-left">Detalles</span>
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
        <div class="panel panel-red">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-star-o fa-4x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="small">
                  <h2>
                    <?php $estadistica->archivosSinAcciones($rfc,$tmp_permiso); ?>
                  </h2>
                </div>
                <div>Sin Acciones</div>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer">
              <span class="pull-left">Detalles</span>
              <span class="pull-right">
                <i class="fa fa-arrow-circle-right"></i>
              </span>
              <div class="clearfix">
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <?php require(HTML_DIR . 'archivos/bitacora.php'); ?>
  </div>
</body>
