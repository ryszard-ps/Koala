<?php
/**
* Mostrar detalles del xml
*
* @author Ricardo Pascual
* @author https://github.com/Ryszardp
*
**/
class MostrarArchivos{
    /**
    * @access private
    * @param  array
    * array de datos del archivo que devuelve la bd
    * A esta clase no puede ser accedida desde otra clase o desde otro lugar
    *
    **/
    private function crearDetalle($contexto,$contador){
        $ruta = 'archivos/' . $contexto['nombre_xml'] . ".xml";
        $sxe = simplexml_load_file($ruta);
        $ns = $sxe->getNamespaces(true);
        $sxe->registerXPathNamespace('c', $ns['cfdi']);
        $sxe->registerXPathNamespace('t', $ns['tfd']);
        $sxe->registerXPathNamespace('n', $ns['nomina']);

        foreach ($sxe->xpath('//c:Comprobante') as $cfdi) {
          $xml_comprobante_lugar_expedicion =$cfdi['LugarExpedicion'];
          $xml_comprobante_tipo_comprobante =$cfdi['tipoDeComprobante'];
          $xml_comprobante_sueldo =$cfdi['total'];
          $xml_comprobante_moneda =$cfdi['Moneda'];
          $xml_comprobante_mot_descuento =$cfdi['motivoDescuento'];
          $xml_comprobante_descuento =$cfdi['descuento'];
          $xml_comprobante_metodo_de_pago=$cfdi['metodoDePago'];
          $xml_comprobante_subtotal=$cfdi['subTotal'];
        }

        foreach ($sxe->xpath('//c:Emisor') as $cfdi) {
          $xml_emisor_nombre =$cfdi['nombre'];
          $xml_emisor_rfc =$cfdi['rfc'];
        }

        foreach ($sxe->xpath('//c:Receptor') as $cfdi) {
          $xml_receptor_nombre=$cfdi['nombre'];
          $xml_receptor_rfc=$cfdi['rfc'];
        }

        foreach ($sxe->xpath('//n:Nomina') as $cfdi) {
            $xml_nomina_periodicidad=$cfdi['PeriodicidadPago'];
            $xml_nomina_puesto = (empty($cfdi['Puesto'])) ? "Sin Datos" : $cfdi['Puesto'] ;
            $xml_nomina_dpto=(empty($cfdi['Departamento'])) ? "Sin Datos" : $cfdi['Departamento'] ;
            $xml_nomina_dias_pagados=$cfdi['NumDiasPagados'];
            $xml_nomina_fin_pago=$cfdi['FechaFinalPago'];
            $xml_nomina_inicio_pago=$cfdi['FechaInicialPago'];
            $xml_nomina_fecha_pago=$cfdi['FechaPago'];
            $xml_nomina_ss=(empty($cfdi['NumSeguridadSocial'])) ? "Sin Datos" : $cfdi['NumSeguridadSocial'] ;
            $xml_nomina_curp=$cfdi['CURP'];
        }

        if($contexto['visto']==1){
          $visto='<button id="visto'.$contador.'" type="button" class="btn btn-info" data-toggle="modal" data-target="#ver'.$contador.'">Visto</button>';
        }else{
          $visto='<button id="visto'.$contador.'" type="button" class="btn btn-warning" data-toggle="modal" data-target="#ver'.$contador.'" onclick="verArchivo('.$contador.')">No Visto</button>';
        }
        if($contexto['descargado']==1){
          $descarga = '<input type="hidden" name="archivo" value="' . $contexto['nombre_xml'] . '">
            <button type="submit" class="btn btn-info">Descargado</button>';
        }else{
          $descarga = '<input type="hidden" name="archivo" value="' . $contexto['nombre_xml'] . '">
            <button type="submit" class="btn btn-warning">No Descargado</button>';
        }

        echo '<div class="col-sm-8 col-md-6">
                <div class="thumbnail alert-success">
                  <div class="row ">
                    <div class="col-xs-1">
                      <i class="fa fa-code fa-3x"></i>
                    </div>
                    <div class="col-xs-11 text-right">
                      <div class="small"><h4>',$contexto['rfc_receptor'],'</h4></div>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="col-xs-12 text-right">
                      <div class="small"><h5>RFC responsable: ',$contexto['rfc_responsable'],'</h5></div>
                    </div>
                    <div class="col-xs-12 text-right">
                      <div class="small"><h5>Sueldo: $ ',$contexto['sueldo'],' MXN</h5></div>
                    </div>
                    <div class="col-xs-12 text-right">
                      <div class="small"><h5>Fecha de pago: ',$contexto['fecha_pago'],'</h5></div>
                    </div>
                    <div class="col-xs-12 text-right">
                      <div class="small" ><h6 id="xml'.$contador.'">',$contexto['nombre_xml'],'</h6></div>
                    </div>

                    <div class="col-xs-12 text-center">
                      <form class="" action="?vista=descargar" method="POST">
                        <p>',$visto,' ',$descarga,'</p>
                      </form>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="ver'.$contador.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center" id="myModalLabel">Detalles de nomina</h4>
                          </div>
                          <div class="modal-body">
                              <div class="panel-heading alert-info">Datos del Emisor</div>
                              <div class="well well-sm">
                                <dl class="dl-horizontal">
                                  <dt>Nombre:</dt>
                                  <dd>',$xml_emisor_nombre,'</dd>
                                  <dt>RFC:</dt>
                                  <dd>',$xml_emisor_rfc,'</dd>
                                </dl>
                              </div>

                              <div class="panel-heading alert-info">Datos del Receptor</div>
                              <div class="well well-sm">
                                <dl class="dl-horizontal">
                                  <dt>Nombre:</dt>
                                  <dd>',$xml_receptor_nombre,'</dd>
                                  <dt>RFC:</dt>
                                  <dd>',$xml_receptor_rfc,'</dd>
                                  <dt>CURP:</dt>
                                  <dd>',$xml_nomina_curp,'</dd>
                                  <dt>No. de seguro social:</dt>
                                  <dd>',$xml_nomina_ss,'</dd>
                                  <dt>Puesto:</dt>
                                  <dd>',$xml_nomina_puesto,'</dd>
                                  <dt>Departamento:</dt>
                                  <dd>',$xml_nomina_dpto,'</dd>
                                </dl>
                              </div>

                              <div class="panel-heading alert-info">Datos de Nomina</div>
                              <div class="well well-sm">
                                <dl class="dl-horizontal">
                                  <dt>Fechas:</dt>
                                  <dd>',$xml_nomina_inicio_pago," al ",$xml_nomina_fin_pago,'','</dd>','
                                  <dt>Fecha de pago:</dt>
                                  <dd>',$xml_nomina_fecha_pago,'</dd>
                                  <dt>Periodicidad de pago:</dt>
                                  <dd>',$xml_nomina_periodicidad,'</dd>
                                  <dt>Días pagados:</dt>
                                  <dd>',$xml_nomina_dias_pagados,'</dd>
                                  <dt>Lugar de expedición:</dt>
                                  <dd>',$xml_comprobante_lugar_expedicion,'</dd>
                                  <dt>Forma de pago:</dt>
                                  <dd>',$xml_comprobante_metodo_de_pago,'</dd>
                                  <dt>Comprobante:</dt>
                                  <dd>',$xml_comprobante_tipo_comprobante,'</dd>
                                  <dt>Sueldo:</dt>
                                  <dd>',$xml_comprobante_sueldo,'</dd>
                                  <dt>Descuento:</dt>
                                  <dd>',$xml_comprobante_descuento,'</dd>
                                  <dt>Subtotal:</dt>
                                  <dd>',$xml_comprobante_subtotal,'</dd>
                                </dl>
                              </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                          </div>
                        </div>
                      </div>

                  <!-- FIN Modal -->

                  </div>
                </div>
              </div>';

    }

    /**
    * @access public
    * @param String
    * $rfc del usuario y su respectivo $permiso
    *
    **/
    public function verArchivos($rfc, $permiso, $parametro, $peticion){
      $datos = new Conexion();
      if($permiso==0){
        switch ($peticion) {
          case 1:
            $sql = $datos->query("SELECT * FROM archivo_empleado WHERE rfc_receptor='$rfc' AND (nombre_xml LIKE '%$parametro%' OR rfc_receptor LIKE '%$parametro%' OR fecha_pago LIKE '%$parametro%');");
            break;

          default:
            $sql = $datos->query("SELECT * FROM archivo_empleado WHERE rfc_receptor='$rfc';");
            break;
        }
        if($datos->filas($sql)>0){
          $contador=0;
          while($contexto = $datos->recorrer($sql)){
            $this->crearDetalle($contexto, $contador++);
          }
        } else {
          echo'<div class="alert alert-info" role="alert"><strong>No se encontraron archivos</strong> :( </div>';
        }
      } else if ($permiso==1) {
        switch ($peticion) {
          case 1:
            $sql = $datos->query("SELECT * FROM archivo_empleado WHERE rfc_responsable='$rfc' AND (rfc_responsable  LIKE '%$parametro%' OR rfc_receptor  LIKE '%$parametro%' OR nombre_xml LIKE '%$parametro%' OR fecha_pago LIKE '%$parametro%');");
            break;
          default:
            $sql = $datos->query("SELECT * FROM archivo_empleado WHERE rfc_responsable='$rfc';");
            break;
        }
        if($datos->filas($sql)>0){
          $contador=0;
          while($contexto = $datos->recorrer($sql)){
            $this->crearDetalle($contexto, $contador++);
          }
        } else {
          echo'<div class="alert alert-info" role="alert"><strong>No se encontraron archivos</strong> :( </div>';

        }
      } else{
        switch ($peticion) {
          case 1:
            $sql = $datos->query("SELECT * FROM archivo_empleado WHERE rfc_responsable LIKE '%$parametro%' OR rfc_receptor LIKE '%$parametro%' OR nombre_xml LIKE '%$parametro%' OR fecha_pago LIKE '%$parametro%';");
            break;

          default:
            $sql = $datos->query("SELECT * FROM archivo_empleado;");
            break;
        }
          if($datos->filas($sql)>0){
            $contador=0;
            while($contexto = $datos->recorrer($sql)){
              $this->crearDetalle($contexto, $contador++);
            }
        } else {
          echo'<div class="alert alert-info" role="alert"><strong>No se encontraron archivos</strong> :( </div>';
        }
      }
      $datos->liberar($sql);
      $datos->close();
    }
  }
 ?>
