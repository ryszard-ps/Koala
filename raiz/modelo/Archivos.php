<?php
class Archivos{
  public function guardarArchivos($usuario,$receptor_rfc,$sueldo,$fecha_fin,$uuid,$receptor_nombre,$ss,$curp,$puesto,$dpto){
    $datos_empleado = explode(" ", $receptor_nombre);
    $nombre="";

    $datos = new Conexion();
    $sql = $datos->query("SELECT rfc FROM empleado WHERE rfc='$receptor_rfc' LIMIT 1;");
    if($datos->filas($sql)>0){
      $datos->query("INSERT INTO archivo_empleado(rfc_responsable,rfc_receptor, sueldo, nombre_xml,fecha_pago) VALUES ('$usuario','$receptor_rfc','$sueldo','$uuid','$fecha_fin');");
      $info="Se agrego nuevo archivo nombre: " .$uuid."xml ". "del empleado con RFC: " . $receptor_rfc;
      $datos->query("INSERT INTO movimiento_empleado(rfc_responsable, descripcion, tipo) VALUES ('$usuario','$info','1');");
    } else {
      for ($i=0; $i < count($datos_empleado); $i++) {
        if ($i==0) {
          $apellido_paterno = $datos_empleado[$i];
        } else if($i==1) {
          $apellido_materno = $datos_empleado[$i];
        } else {
          $nombre .= $datos_empleado[$i]." ";
        }
      }
      $clave=SHA1($ss);
      $datos->query("INSERT INTO empleado(rfc,nombres,apellido_p,apellido_m,curp,nss,puesto,departamento,clave) VALUES ('$receptor_rfc','$nombre','$apellido_paterno','$apellido_materno','$curp','$ss','$puesto','$dpto','$clave');");
      $datos->query("INSERT INTO archivo_empleado(rfc_responsable,rfc_receptor, sueldo, nombre_xml,fecha_pago) VALUES ('$usuario','$receptor_rfc','$sueldo','$uuid','$fecha_fin');");
      $info="Se agrego nuevo empleado RFC: " . $receptor_rfc." Nombre: ".$receptor_nombre;
      $datos->query("INSERT INTO movimiento_empleado(rfc_responsable, descripcion, tipo) VALUES ('$usuario','$info','1');");
      $info="Se agrego nuevo archivo nombre: " .$uuid."xml ". "del empleado con RFC: " . $receptor_rfc;
      $datos->query("INSERT INTO movimiento_empleado(rfc_responsable, descripcion, tipo) VALUES ('$usuario','$info','1');");
    }
    $datos->liberar($sql);
    $datos->close();
  }
}
 ?>
