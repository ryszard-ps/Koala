<?php
/**
*
* Incluye la vista asociada a la petición de verarchivos
*
* @author Ricardo Pascual
* @author https://github.com/Ryszardp
*
**/
require(HTML_DIR . 'global/cabecera.php');

if (!isset($_SESSION['usuario'])){
  include(HTML_DIR . 'publico/autenticacion.html');
} else {
  require('raiz/logica/funcion/MostrarArchivos.php');
  $tmp_permiso = $_SESSION['usuario']['permiso_tmp'];
  $rfc = $_SESSION['usuario']['rfc'];

  if ($tmp_permiso == 0) {
    require(HTML_DIR . '/global/nav_empleado.php');
  } elseif ($tmp_permiso == 1) {
    require(HTML_DIR . '/global/nav_zona.php');
  } else {
    require(HTML_DIR . '/global/nav_admin.php');
  }
  require(HTML_DIR . '/archivos/verArchivos.php');
}
require(HTML_DIR . 'global/pie.php');
 ?>
