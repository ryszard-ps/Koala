<?php
class Bitacora{
  function crearFila($contexto){
    if($contexto['visto']==1){
      $visto=$contexto['fecha_visto'];
    } else {
      $visto = '<span class="glyphicon glyphicon-remove"></span>';
    }

    if($contexto['descargado']==1){
      $descarga=$contexto['fecha_descarga'];
    } else {
      $descarga = '<span class="glyphicon glyphicon-remove"></span>';

    }
    //crearDetalle($contexto);
    echo '<tr><td>',$contexto['rfc_receptor'],'</td>',
         '<td>',$contexto['nombre_xml'],'</td>',
         '<td>',$contexto['fecha_pago'],'</td>',
         '<td class="text-center">',$visto,'</td>',
         '<td class="text-center">',$descarga,'</td></tr>';
  }

  function mostrarBitacora($rfc, $permiso){
    $datos = new Conexion();
    if($permiso==0){
      $sql = $datos->query("SELECT * FROM archivo_empleado WHERE rfc_receptor='$rfc';");
      if($datos->filas($sql)>0){
        $archivos = "";
        while($contexto = $datos->recorrer($sql)){
          $this->crearFila($contexto);
        }
      } else {
        echo'<div class="alert alert-info" role="alert"><strong>No existen archivos</strong>, Actualmente.</div>';
      }
    } else if ($permiso==1) {
      $sql = $datos->query("SELECT * FROM archivo_empleado WHERE rfc_responsable='$rfc';");
      if($datos->filas($sql)>0){
      $archivos = "";
        while($contexto = $datos->recorrer($sql)){
          $this->crearFila($contexto);
        }
      } else {
        echo'<div class="alert alert-info" role="alert"><strong>No existen archivos</strong>, Actualmente.</div>';
      }

    } else{
        $sql = $datos->query("SELECT * FROM archivo_empleado;");
        if($datos->filas($sql)>0){
        $archivos = "";
          while($contexto = $datos->recorrer($sql)){
            $this->crearFila($contexto);
          }
      } else {
        echo'<div class="alert alert-info" role="alert"><strong>No existen archivos</strong>, Actualmente.</div>';
      }
    }
    $datos->liberar($sql);
    $datos->close();
    #return $archivos;
  }
}

 ?>
