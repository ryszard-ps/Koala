<?php
/**
* Crea conexión con la bd
*
* @author Ricardo Pascual
* @author https://github.com/Ryszardp
*
* Extendemos de la clase mysqli para obtener todos sus métodos
* y atributos.
*
**/

  class Conexion extends mysqli {

    /**
    * @access private
    * Accedemos al contructor de la clase mysqli
    * creamos la conexión a la bd
    *
    **/
    public function __construct(){
      parent::__construct(DB_SEVIDOR, DB_USUARIO, DB_CLAVE, DB_NOMBRE);
      $this->connect_errno ? die('Error en la conexion a la bd') : null;
      $this->set_charset("utf8");
    }

    /**
    * @access public
    * @return int
    * nos devuelve el número total de una consulta
    *
    **/
    public function filas($consulta){
      return mysqli_num_rows($consulta);
    }

    /**
    * @access public
    * Libreramos el sql de consulta
    *
    **/
    public function liberar($consulta){
      return mysqli_free_result($consulta);
    }

    /**
    * @access public
    * @return array
    * devuelve un arreglo asociativo
    **/
    public function recorrer($consulta){
      return mysqli_fetch_array($consulta);
    }
  }
 ?>
