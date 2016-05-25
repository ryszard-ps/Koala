<?php
header("Content-type: application/vnd.ms-excel");
header("Content-type: application/vnd.ms-word");
require('dompdf/dompdf_config.inc.php');
if(empty($_POST["datos"])){
  echo "Error, privilegios no validos";
  #header("Location:error-index.html");
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
  <title>Reportes</title>
</head>
<body> <div align="center">
<h1 style="color:#819ff7">Reporte de '.$tabla.'</h1>
<table class="table table-bordered" align="center"  border="1">

	<tr>';
		for ($i=0; $i <$count ; $i++) {
$codigoHTML.='
		<th>'.$datos[$i].'</th>';
	 }
$codigoHTML.='</tr>';

		while($res = $conexion->recorrer($consulta)){
$codigoHTML.='
		<tr>';
			for ($i=0; $i <$count ; $i++) {
$codigoHTML.='<td>'.$res[$i].'</td>';
			}
$codigoHTML.='</tr>';
		}
$codigoHTML.='
</table>
</div>
</div>
</body>
</html>';
#echo utf8_encode($codigoHTML) ;

if ($documento=="pdf"){
  $nombre = "Reporte de ".$tabla.".pdf";
  $codigoHTML=utf8_encode($codigoHTML);
  $dompdf=new DOMPDF();
  $dompdf->load_html($codigoHTML);
  ini_set("memory_limit","128M");
  $dompdf->render();
  $dompdf->stream($nombre);
} else if($documento=="excel"){
  $nombre = "Reporte de ".$tabla.".xls";
  header("Content-Disposition: attachment; filename=".$nombre);
  echo utf8_encode($codigoHTML) ;
} else if($documento =="word"){
  $nombre = "Reporte de ".$tabla.".doc";
  header("Content-Disposition: attachment; filename=".$nombre);
  echo utf8_encode($codigoHTML) ;
}
?>
