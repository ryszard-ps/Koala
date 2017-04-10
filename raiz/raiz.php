<?php

/**
*
* Carga de archivos globales de la aplicación
*
* @author Ricardo Pascual
* @author https://github.com/Ryszardp
*
* Carga
* Constantes de servidor
* Constantes de directorios
* Funciones generales
*
**/
//Imagen del logo
$logo = '<img src="vistas/imagenes/logo.png" border="0" width="110" height="30">';

session_start();

# constantes de base de datos
define('DB_SEVIDOR', getenv('BD_SERVIDOR'));
define('DB_USUARIO', getenv('BD_USUARIO'));
define('DB_CLAVE', getenv('BD_CLAVE'));
define('DB_NOMBRE', getenv('BD_NOMBRE'));
$fecha =  date('\F\e\c\h\a \d\e \e\m\i\s\i\ó\n: Y/m/d  \d\e\l H:i:s');
# constantes directorios
define('HTML_DIR','html/');
define('TITULO_APP', $logo);
define('FECHA', $fecha);
# constantes de funciones
require('raiz/modelo/Conexion.php');
require('raiz/modelo/Archivos.php');
require('raiz/logica/funcion/LeerArchivos.php');
?>
