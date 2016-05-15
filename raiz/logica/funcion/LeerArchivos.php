<?php
class LeerArchivos{

  /**
  *leer archivos al servidor
  *@access public
  *@param string $rfc usuario para mostrarle los arhivos correspondientes
  */

  const DIRECTORIO = 'temporal';
  const DIRECTORIO_A='archivos';

  public function archivosTemporales($usuario){
    if(is_dir("temporal/")){
      $array_directorio = array_diff(scandir(self::DIRECTORIO), array('..', '.'));
      if(count($array_directorio)>0){
        foreach($array_directorio as $posicion=>$archivo)
        {
          $this->renombrarArchivos($archivo,$usuario);
        }
      } else {
        echo'<div class="alert alert-info" role="alert"><strong>No existen archivos</strong>, por asignar.</div>';
      }
    }else{
      echo'<div class="alert alert-danger" role="alert"><strong>Error: </strong> directorio no econtrado</div>';
    }
  }

  public function renombrarArchivos($nombre_archivo,$usuario){
    $url = self::DIRECTORIO . '/' . $nombre_archivo;
    $xml_nuevo=self::DIRECTORIO_A.'/';
    $xml_actual = simplexml_load_file($url);
    if(!is_dir("archivos/"))
        mkdir("archivos/", 0777);
    $sxe = simplexml_load_file($url);
    $ns = $sxe->getNamespaces(true);
    $sxe->registerXPathNamespace('c', $ns['cfdi']);
    $sxe->registerXPathNamespace('t', $ns['tfd']);
    $sxe->registerXPathNamespace('n', $ns['nomina']);

    foreach ($sxe->xpath('//t:TimbreFiscalDigital') as $tfd) {
      $uuid = $tfd['UUID'];
      $uuid_nombre = $tfd['UUID'].'.xml';
      $url_validar=self::DIRECTORIO_A.'/'.$uuid_nombre;
      #validamos si existe el archivo en la carpeta archivos
      if (file_exists($url_validar)) {
        echo '<div class="col-sm-8 col-md-6">
        <div class="thumbnail alert-danger">
        <div class="row ">
        <div class="col-xs-1">
        <i class="fa fa-code fa-4x"></i>
        </div>
        <div class="col-xs-11 text-right">
        <div class="small"><h4>' . $uuid_nombre . '</h4></div>
        </div>
        <div class="col-xs-11 text-right">
        <div class="small"><h4>Ya, existe este archivo!!!</h4></div>
        </div>
        </div>
        </div>
        </div>';
        unlink($url);
      } else {
        if (rename ($url, $xml_nuevo . $tfd['UUID'].'.xml')) {
          foreach ($sxe->xpath('//c:Comprobante') as $cfdi) {
            $sueldo =$cfdi['total'];
          }
          foreach ($sxe->xpath('//c:Receptor') as $cfdi) {
            $receptor_nombre=$cfdi['nombre'];
            $receptor_rfc=$cfdi['rfc'];
          }
          foreach ($sxe->xpath('//n:Nomina') as $cfdi) {
            $fecha_fin=$cfdi['FechaFinalPago'];
            $ss=$cfdi['NumSeguridadSocial'];
            $curp=$cfdi['CURP'];
            $puesto=$cfdi['Puesto'];
            $dpto = $cfdi['Departamento'];
          }
          echo '<div class="col-sm-6 col-md-4">
                  <div class="thumbnail alert-success">
                    <div class="row ">
                      <div class="col-xs-1">
                        <i class="fa fa-code fa-4x"></i>
                      </div>
                      <div class="col-xs-11 text-right">
                        <div class="small"><h4>',$receptor_rfc,'</h4></div>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="col-xs-12 text-right">
                        <div class="small"><h5>',$receptor_nombre,'</h5></div>
                      </div>
                      <div class="col-xs-12 text-right">
                        <div class="small"><h5> $ ',$sueldo,'</h5></div>
                      </div>
                      <div class="col-xs-12 text-right">
                        <div class="small"><h5>',$fecha_fin,'</h5></div>
                      </div>
                      <div class="col-xs-12 text-right">
                        <div class="small"><h6>',$uuid_nombre,'</h6></div>
                      </div>
                    </div>
                  </div>
                </div>';
                $nuevoArchivo = New Archivos();
                $nuevoArchivo->guardarArchivos($usuario,$receptor_rfc,$sueldo,$fecha_fin,$uuid,$receptor_nombre,$ss,$curp,$puesto,$dpto);
        } else {
          echo'<div class="alert alert-danger" role="alert"><strong>Error: </strong> al intentar renombrar tuvimos problemas</div>';
        }
      }
    }
  }
}
?>
