<?php
require('raiz/logica/funcion/MostrarArchivos.php');
if (!empty($_POST['palabra'])){
  $patron= trim($_POST['palabra']);
  $permiso = $_SESSION['usuario']['permiso_tmp'];
  $rfc = $_SESSION['usuario']['rfc'];
  $archivo = new MostrarArchivos();
  $archivo->verArchivos($rfc, $permiso, $patron, 1);
  #print_r($_SESSION['descargar']);
} else {

    echo '<div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Por favor ingrese, algún tipo de parametro para hacer la busqueda</strong></div>';
}
?>
