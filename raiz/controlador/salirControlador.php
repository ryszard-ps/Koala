<?php
/**
*
* Se destruye la sesión del usuario
*
* @author Ricardo Pascual
* @author https://github.com/Ryszardp
*
* La petición de salir
* Redirecciona a la pagina de inicio
**/
session_destroy();
header('Location:?vista=inicio');
 ?>
