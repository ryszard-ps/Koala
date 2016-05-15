<?php
/**
* Incluye la vista asociada a la petición de incio  y también es página de incio
**/

require(HTML_DIR . 'global/cabecera.php');

if (!isset($_SESSION['usuario'])){
  include(HTML_DIR . 'publico/autenticacion.html');
} else {
  #require(HTML_DIR . 'global/navegacion.php');
  require(HTML_DIR . '/inicio/inicio.php');
}

require(HTML_DIR . 'global/pie.php');
 ?>
