<?php
/**
*Muestra la actividad de los archivos de nomina
*
* @author Ricardo Pascual
* @author https://github.com/Ryszardp
*
**/

class Bitacora{

  /**
  * @access private
  * @param array datos del archivo generales xml
  * @return String
  * a esta función solo la podemos acceder desde la propia clase
  * Devolvemos codigo html
  **/
  private function crearFila($contexto) {
    if($contexto['visto'] == 1) {
      $visto=$contexto['fecha_visto'];
    } else {
      $visto = '<span class="glyphicon glyphicon-remove"></span>';
    }

    if($contexto['descargado'] == 1) {
      $descarga=$contexto['fecha_descarga'];
    } else {
      $descarga = '<span class="glyphicon glyphicon-remove"></span>';
    }
    //crearDetalle($contexto);
    echo '<tr class="text-center"><td>',$contexto['rfc_receptor'],'</td>',
         '<td>',$contexto['nombre_xml'],'</td>',
         '<td>',$contexto['fecha_pago'],'</td>',
         '<td class="text-center">',$visto,'</td>',
         '<td class="text-center">',$descarga,'</td></tr>';
  }

  /**
  * @access public
  * @param String, string
  * rfc del empleado de sesión y su respectivo permiso
  * @return String
  * si existiera algún tipo de error o en su defecto crea la fila
  **/
  public function mostrarBitacora($rfc, $permiso, $peticion) {
    $datos = new Conexion();
    if($permiso == 0){
      switch ($peticion) {
        case 1:
          $sql = $datos->query("SELECT * FROM archivo_empleado WHERE rfc_receptor='$rfc' ORDER BY  fecha_pago DESC LIMIT 20;");
          break;

        default:
          $sql = $datos->query("SELECT * FROM archivo_empleado WHERE rfc_receptor='$rfc' ORDER BY  fecha_pago DESC;");
          break;
      }
      if($datos->filas($sql)>0){
        $archivos = "";
        while($contexto = $datos->recorrer($sql)){
          $this->crearFila($contexto);
        }
      } else {
        echo'<div class="alert alert-info" role="alert"><strong>No existen archivos</strong>, Actualmente.</div>';
      }
    } else if ($permiso == 1) {
      switch ($peticion) {
        case 1:
          $sql = $datos->query("SELECT * FROM archivo_empleado WHERE rfc_responsable='$rfc' ORDER BY  fecha_pago DESC LIMIT 30;");
          # code...
          break;

        default:
          $sql = $datos->query("SELECT * FROM archivo_empleado WHERE rfc_responsable='$rfc' ORDER BY  fecha_pago DESC;");
          break;
      }
      if($datos->filas($sql)>0){
      $archivos = "";
        while($contexto = $datos->recorrer($sql)){
          $this->crearFila($contexto);
        }
      } else {
        echo'<div class="alert alert-info" role="alert"><strong>No existen archivos</strong>, Actualmente.</div>';
      }
    } else{
        switch ($peticion) {
          case 1:
            $sql = $datos->query("SELECT * FROM archivo_empleado ORDER BY  fecha_pago DESC LIMIT 30;");
            # code...
            break;

          default:
            $sql = $datos->query("SELECT * FROM archivo_empleado ORDER BY  fecha_pago DESC;");
            break;
        }
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
  }
}
?>
