<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="?vista=inicio"> < Koala /> </a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
<!-- /.dropdown -->
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">
<i class="fa fa-user fa-fw">  </i> <?php echo $usuarios[$_SESSION['app_id']]['nombres']," ",$usuarios[$_SESSION['app_id']]['apellido_p']; ?>  <i class="fa fa-caret-down"> </i>
</a>
<ul class="dropdown-menu dropdown-user">
<li><a href="#"><i class="fa fa-user fa-fw"></i> Mi perfil</a>
</li>
<li class="divider"></li>
<li><a href="?vista=salir"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
</li>
</ul>
<!-- /.dropdown-user -->
</li>
<!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
<div class="sidebar-nav navbar-collapse">
  <ul class="nav" id="side-menu">
    <li>
      <a href="?vista=inicio"><i class="fa fa-home fa-fw"></i> Inicio</a>
    </li>
    <li>
      <a href="#"><i class="fa fa-file-code-o fa-fw"></i> Archivos XML<span class="fa arrow"></span></a>
      <ul class="nav nav-second-level">
        <li>
          <a href="?vista=verarchivos">Ver Archivos</a>
        </li>
      </ul>
      <!-- /.nav-second-level -->
    </li>
  </ul>
</div>
<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>
