<?php
/**
*
* Actualiza cuando un archivo es visto
* por el empleado al que le corresponda
*
* @author Ricardo Pascual
* @author https://github.com/Ryszardp
*
**/
  $permiso= $_SESSION['usuario']['permiso_tmp'];
  if ($permiso==0) {
    $datos = new Conexion();
    $contexto = $datos->real_escape_string($_POST['contenido']);
    $sql = $datos->query("UPDATE archivo_empleado SET visto = 1, fecha_visto=NOW() WHERE nombre_xml='$contexto';");
  }
?>
