<?php
/**
*
* Carga de archivos para ajax
*
* @author Ricardo Pascual
* @author https://github.com/Ryszardp
*
* Verifica si el existe una petición por POST.
*
* si la variable $_GET['tipo'] existe es una petición por Ajax
* por lo tanto verificamos a que archivo corresponde la petición
*
**/

if ($_POST) {
  require('raiz/raiz.php');

  switch (isset($_GET['tipo']) ? $_GET['tipo'] : null ) {
    case 'autenticacion':
      require('raiz/logica/ajax/iniciarAutenticacion.php');
      break;
    case 'subirarchivos':
      require('raiz/logica/ajax/validarArchivos.php');
      break;
    case 'activarvisto':
      require('raiz/logica/ajax/activarVisto.php');
      break;
    case 'buscararchivos':
      require('raiz/logica/ajax/buscarArchivos.php');
      break;
    default:
      header('location: index.php');
      break;
  }

} else {
  header('location: index.php');
}
 ?>
