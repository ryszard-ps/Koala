<?php
/**
* leer archivos al servidor
*
* @author Ricardo Pascual
* @author https://github.com/Ryszardp
*
**/

class ArchivosTemporales{
    /**
    * sube archivos al servidor a través de un formulario
    * @access public
    * @param array
    * $files estructura de array con todos los archivos a subir
    * a la carpeta temporal.
    */
    public function subirArchivos($files = array()) {
        $i = 0;
        if(!is_dir("temporal/"))
            mkdir("temporal/", 0777);
        foreach ($files as $file){
            if ($_FILES['files']['tmp_name'][$i])
            {
                $partes[$i] = explode(".", $_FILES["files"]["name"][$i]);
                $extension[$i] = end($partes[$i]);

                if ($this->validaExtension($extension[$i]) === TRUE) {
                    if($_FILES['files']['tmp_name'][$i]){
                      if(move_uploaded_file($_FILES['files']['tmp_name'][$i],"temporal/".$_FILES['files']['name'][$i]))
                      {
                        //procesar a la bd
                      }
                    }
                }else{
                  //  echo "la extension no esta permitida";
                }
            }else{
            }
            $i++;
        }
    }
    /**
    *funcion privada que devuelve true o false dependiendo de la extension
    *@access private
    *@param string
    *@return boolean
    * si esta o no permitido el tipo de archivo
    */
    private function validaExtension($extension) {
        //aqui podemos añadir las extensiones que deseemos permitir
        $extensiones = array("xml");
        if(in_array(strtolower($extension), $extensiones))
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }
}

$archivos = $_FILES['files']['name'];
$cargar = new ArchivosTemporales();
$archivosCargados = $cargar->subirArchivos($archivos);
?>
