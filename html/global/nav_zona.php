<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="?vista=inicio">
      <?php echo TITULO_APP; ?>
    </a>
  </div>
  <ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-fw"></i>
        <?php echo $_SESSION['usuario']['nombres']," ",$_SESSION['usuario']['apellido_p'] ?>
        <i class="fa fa-caret-down"></i>
      </a>
      <ul class="dropdown-menu dropdown-user">
        <li>
          <a href="#"><i class="fa fa-user fa-fw"></i> Mi perfil</a>
        </li>
        <li class="divider"></li>
        <li>
          <a href="?vista=salir">
          <i class="fa fa-sign-out fa-fw"></i> Salir</a>
        </li>
      </ul>
    </li>
  </ul>
  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
      <ul class="nav" id="side-menu">
        <li>
          <a href="?vista=inicio"><i class="fa fa-home fa-fw"></i> Inicio</a>
        </li>
        <li>
          <a href="#"><i class="fa fa-file-code-o fa-fw"></i> Archivos XML
            <span class="fa arrow"></span>
          </a>
          <ul class="nav nav-second-level">
            <li>
              <a href="?vista=verarchivos">Ver Archivos</a>
            </li>
            <li>
              <a href="?vista=validararchivos">Subir Archivos</a>
            </li>
            <li>
              <a href="?vista=renombrararchivos">Renombrar Archivos</a>
            </li>
          </ul>
        </li>
<!--
        <li>
          <a href="#"><i class="fa fa-users fa-fw"></i> Empleados
            <span class="fa arrow"></span>
          </a>
          <ul class="nav nav-second-level">
            <li>
              <a href="#">Ver Empleados</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Estadisticas<span class="fa arrow"></span>
          </a>
          <ul class="nav nav-second-level">
            <li>
                <a href="#">Vistos</a>
            </li>
            <li>
              <a href="#">Descargados</a>
            </li>
          </ul>
        </li>
      -->
        
      </ul>
    </div>
  </div>
</nav>
