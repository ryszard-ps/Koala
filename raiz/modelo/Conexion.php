<?php
  class Conexion extends mysqli {
    public function __construct(){
      parent::__construct(DB_SEVIDOR, DB_USUARIO, DB_CLAVE, DB_NOMBRE);
      $this->connect_errno ? die('Error en la conexion a la bd') : null;
      $this->set_charset("utf8");
    }

    public function filas($consulta){
      return mysqli_num_rows($consulta);
    }
    public function liberar($consulta){
      return mysqli_free_result($consulta);
    }
    public function recorrer($consulta){
      return mysqli_fetch_array($consulta);
    }
  }
 ?>
