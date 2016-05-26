<?php
class Estadisticas{
  function archivosTodos($rfc, $permiso){
    $datos = new Conexion();
    if($permiso==0){
      $sql = $datos->query("SELECT count(id) FROM archivo_empleado WHERE rfc_receptor='$rfc';");
      $cantidad=$datos->recorrer($sql)[0];
      return  $cantidad;
    } else if($permiso==1) {
      $sql = $datos->query("SELECT count(id) FROM archivo_empleado WHERE rfc_responsable='$rfc';");
      $cantidad=$datos->recorrer($sql)[0];
      return $cantidad;
    } else {
      $sql = $datos->query("SELECT count(id) FROM archivo_empleado;");
      $cantidad=$datos->recorrer($sql)[0];
      return  $cantidad;
    }
    $datos->liberar($sql);
    $datos->close();
  }

  function archivosVistosDescargados($rfc, $permiso){
    $datos = new Conexion();
    if($permiso==0){
      $sql = $datos->query("SELECT count(id) FROM archivo_empleado WHERE (descargado=1 AND visto=1) AND rfc_receptor='$rfc';");
      $cantidad=$datos->recorrer($sql)[0];
      return  $cantidad;
    } else if($permiso==1) {
      $sql = $datos->query("SELECT count(id) FROM archivo_empleado WHERE (descargado=1 AND visto=1) AND rfc_responsable='$rfc';");
      $cantidad=$datos->recorrer($sql)[0];

      return $cantidad;
    } else {
      $sql = $datos->query("SELECT count(id) FROM archivo_empleado WHERE descargado=1 AND visto=1;");
      $cantidad=$datos->recorrer($sql)[0];
      return  $cantidad;
    }
    $datos->liberar($sql);
    $datos->close();
  }

  function archivosVistosODescargados($rfc, $permiso){
    $datos = new Conexion();
    if($permiso==0){
      $sql = $datos->query("SELECT count(id) FROM archivo_empleado WHERE (descargado=1 OR visto=1) AND rfc_receptor='$rfc';");
      $cantidad=$datos->recorrer($sql)[0];
      return  $cantidad;
    } else if($permiso==1) {
      $sql = $datos->query("SELECT count(id) FROM archivo_empleado WHERE (descargado=1 OR visto=1) AND rfc_responsable='$rfc';");
      $cantidad=$datos->recorrer($sql)[0];
      return  $cantidad;
    } else {
      $sql = $datos->query("SELECT count(id) FROM archivo_empleado WHERE descargado=1 OR visto=1;");
      $cantidad=$datos->recorrer($sql)[0];
      return $cantidad;
    }
    $datos->liberar($sql);
    $datos->close();
  }

  function archivosSinAcciones($rfc, $permiso){
    $datos = new Conexion();
    if($permiso==0){
      $sql = $datos->query("SELECT count(id) FROM archivo_empleado WHERE (descargado=0 AND visto=0) AND rfc_receptor='$rfc';");
      $cantidad=$datos->recorrer($sql)[0];
      return  $cantidad;
    } else if($permiso==1) {
      $sql = $datos->query("SELECT count(id) FROM archivo_empleado WHERE (descargado=0 AND visto=0) AND rfc_responsable='$rfc';");
      $cantidad=$datos->recorrer($sql)[0];
      return  $cantidad;
    } else {
      $sql = $datos->query("SELECT count(id) FROM archivo_empleado WHERE descargado=0 AND visto=0;");
      $cantidad=$datos->recorrer($sql)[0];
      return  $cantidad;
    }
    $datos->liberar($sql);
    $datos->close();
  }
}
 ?>
