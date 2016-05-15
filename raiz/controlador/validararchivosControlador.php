<?php
/**
*
* Incluye la vista asociada a la petición de validararchivos
*
* @author Ricardo Pascual
* @author https://github.com/Ryszardp
*
**/
require(HTML_DIR . 'global/cabecera.php');
if(!isset($_SESSION['usuario'])){
  require(HTML_DIR . 'publico/autenticacion.html');
} else {
  $tmp_permiso = $_SESSION['usuario']['permiso_tmp'];
  if ($tmp_permiso == 0) {
    require(HTML_DIR . '/global/nav_empleado.php');
  } elseif ($tmp_permiso == 1) {
    require(HTML_DIR . '/global/nav_zona.php');
  } else {
    require(HTML_DIR . '/global/nav_admin.php');
  }
  require(HTML_DIR . '/archivos/validarArchivos.php');
}
require(HTML_DIR . 'global/pie.php');
 ?>
