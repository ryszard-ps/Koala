<?php
/**
* La petición de salir
* Se destruye la sesión del usuario
* Redirecciona a la pagina de inicio
**/
session_destroy();
header('Location:?vista=inicio');
 ?>
