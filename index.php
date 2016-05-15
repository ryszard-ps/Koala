<?php
/**
* index.php (archivo de incio) :)
*
* Carga de dependencias generales
*
* @author Ricardo Pascual
* @author https://github.com/Ryszardp
*
* Verifica si el existe un controlador asociado al recurso buscado.
*
* si existe  incluye archivo *.php asociado al controlador, por defecto envia al inicio
* variable string $_GET['vista'] nombre del controlador buscado
*
**/
require('raiz/raiz.php');

if (isset($_GET['vista'])) {
  if (file_exists('raiz/controlador/' . strtolower($_GET['vista']) . 'Controlador.php')) {
    require('raiz/controlador/' . strtolower($_GET['vista']) . 'Controlador.php');
  } else {
    require('raiz/controlador/recursoControlador.php');
  }
} else {
  include('raiz/controlador/inicioControlador.php');
}
 ?>
