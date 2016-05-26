<?php
/**
*
* Descarga de archivos *.xml
*
* @author Ricardo Pascual
* @author https://github.com/Ryszardp
*
**/

$permiso = $_SESSION['usuario']['permiso_tmp'];

if (!isset($_POST['archivo']) || empty($_POST['archivo'])) {
  header("Location:?vista=recurso");
}
# Utilizamos basename por seguridad, devuelve el
# Nombre del archivo eliminando cualquier ruta.
$archivo = basename($_POST['archivo']);
$ruta = 'archivos/' . $archivo . ".xml";

if (is_file($ruta)) {
  header('Content-Type: text/xml');
  header('Content-Disposition: attachment; filename =' . $archivo .".xml");
  header('Content-Transfer-Encoding: binary');
  header('Content-Length: ' . filesize($ruta));
  readfile($ruta);
  if ($permiso == 0) {
    $datos = new Conexion();
    $contexto = $datos->real_escape_string($_POST['archivo']);
    $sql = $datos->query("UPDATE archivo_empleado SET descargado = 1, fecha_descarga=NOW() WHERE nombre_xml='$contexto';");
  }
}
?>
