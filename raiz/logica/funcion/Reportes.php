<?php
require('dompdf/dompdf_config.inc.php');
if(empty($_POST["datos"])){
  header("Location:?vista=recurso");
}

$tabla="Archivos";
$campos="";
$sql="";
$datos=$_POST["datos"];
$count=count($datos);
 for ($i=0; $i <$count ; $i++) {
  if ($datos[$i]) {
  	$campos.=$datos[$i].",";
  }
  else {
  	echo "no selecciondo";
  }
 }
 $sql2=substr($campos,0,strlen($campos) - 1);
 $sql.="select ".$sql2;

 if(isset($_POST['reporte_pdf'])){
   $documento="pdf";
 } else if(isset($_POST['reporte_excel'])){
   $documento="excel";
 } else if(isset($_POST['reporte_word'])){
   $documento="word";
 }
  $opcion=$_POST['option'];
  switch ($opcion) {
    case 1:
      $sql.=" FROM archivo_empleado AS a LEFT JOIN empleado as e ON a.rfc_receptor=e.rfc ORDER BY e.rfc, e.departamento;";
      break;
    case 2:
      $sql.=" FROM archivo_empleado AS a LEFT JOIN empleado as e ON a.rfc_receptor=e.rfc WHERE a.visto = 1 AND a.descargado = 1 ORDER BY e.rfc, e.departamento;";
      break;
    case 3:
      $sql.=" FROM archivo_empleado AS a LEFT JOIN empleado as e ON a.rfc_receptor=e.rfc WHERE a.visto = 1 ORDER BY e.rfc, e.departamento;";
      break;
    case 4:
      $sql.=" FROM archivo_empleado AS a LEFT JOIN empleado as e ON a.rfc_receptor=e.rfc WHERE a.descargado = 1 ORDER BY e.rfc, e.departamento;";
      break;
    case 5:
      $sql.=" FROM archivo_empleado AS a LEFT JOIN empleado as e ON a.rfc_receptor=e.rfc WHERE a.visto = 0 AND a.descargado = 0 ORDER BY e.rfc, e.departamento;";
      break;
    }
  $conexion = new Conexion();
  $consulta = $conexion->query($sql);

$codigoHTML='
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reporte</title>
</head>
<body>
<div align="center">
  <table class="row" align="center"  >
    <thead>
      <tr>
        <th align="left">
      <img src="vistas/imagenes/logo.png" border="0" width="190" height="90">
      </th>
      <th >
      <h1 style="color:#819ff7">Reporte de '.$tabla.'</h1>
      </th>
      </tr>
    </thead>
  </table>
<div>
  <div>
      <table border="1" align="center">
      <thead>
	<tr>';
		for ($i=0; $i <$count ; $i++) {
$codigoHTML.='
		<th  align="center"><font face="Geneva, Arial" size=2>'.$datos[$i].'</font></th>';
	 }
$codigoHTML.='</tr>';
		while($res = $conexion->recorrer($consulta)){
$codigoHTML.='
		<tr>';
			for ($i=0; $i <$count ; $i++) {
        $campo = (empty($res[$i])) ? "Sin Datos" : $res[$i] ;
$codigoHTML.='<td  align="center"><font face="Geneva, Arial" size=1>'.$campo.'</font></td>';
			}
$codigoHTML.='</tr>';
		}
$codigoHTML.='
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
</table>
</div>
</div>
</body>
</html>';
#echo utf8_encode($codigoHTML) ;

if ($documento=="pdf"){
  #$pdf->page_text(765, 550, "Pagina {PAGE_NUM} de {PAGE_COUNT}", $font, 9, array(0, 0, 0));
  $nombre = "Reporte de ".$tabla.".pdf";
  $dompdf = new DOMPDF();
  $dompdf->set_paper("A4", "landscape");

  // load the html content
  $dompdf->load_html($codigoHTML);

  $dompdf->render();
  $canvas = $dompdf->get_canvas();
  $font = Font_Metrics::get_font("helvetica", "bold");
  $canvas->page_text(390, 555, "Página: {PAGE_NUM} de {PAGE_COUNT}", $font, 9, array(0,0,0));
  $canvas->page_text(610, 555, FECHA , $font, 9, array(0,0,0));
  $dompdf->stream($nombre,array("Attachment"=>0));
} else if($documento=="excel"){
  header("Content-type: application/vnd.ms-excel");
  $nombre = "Reporte de ".$tabla.".xls";
  header("Content-Disposition: attachment; filename=".$nombre);
  echo utf8_encode($codigoHTML) ;
} else if($documento =="word"){
  header("Content-type: application/vnd.ms-word");
  $nombre = "Reporte de ".$tabla.".docx";
  header("Content-Disposition: attachment; filename=".$nombre);
  echo utf8_encode($codigoHTML) ;
}

?>
