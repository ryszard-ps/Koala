<?php
class MultiplesArchivos{
    /**
    *sube archivos al servidor a través de un formulario
    *@access public
    *@param array $files estructura de array con todos los archivos a subir
    */
    public function subirArchivos($files = array())
    {
        //inicializamos un contador para recorrer los archivos
        $i = 0;

        //si no existe la carpeta files la creamos
        if(!is_dir("temporal/"))
            mkdir("temporal/", 0777);

        //recorremos los input files del formulario
        foreach($files as $file)
        {
            //si se está subiendo algún archivo en ese indice
            if($_FILES['files']['tmp_name'][$i])
            {
                //separamos las partes del archivo, nombre extension
                $partes[$i] = explode(".", $_FILES["files"]["name"][$i]);

                //obtenemos la extension
                $extension[$i] = end($partes[$i]);

                //si la extensión es una de las permitidas
                if($this->checkExtension($extension[$i]) === TRUE)
                {

                    //comprobamos si el archivo existe o no, si existe renombramos
                    //para evitar que sean eliminados
                    if($_FILES['files']['tmp_name'][$i]){
                      //comprobamos si el archivo ha subido
                      //echo "subida correctamente";
                      if(move_uploaded_file($_FILES['files']['tmp_name'][$i],"temporal/".$_FILES['files']['name'][$i]))
                      {
                        //aqui podemos procesar info de la bd referente a este archivo
                      }
                    }

                //si la extension no es una de las permitidas
                }else{
                  //  echo "la extension no esta permitida";
                }
            //si ese input file no ha sido cargado con un archivo
            }else{
                //echo "sin imagen";
            }
            //echo "<br />";
            //en cada pasada por el loop incrementamos i para acceder al siguiente archivo
            $i++;
        }
    }

    /**
    *funcion privada que devuelve true o false dependiendo de la extension
    *@access private
    *@param string
    *@return boolean - si esta o no permitido el tipo de archivo
    */
    private function checkExtension($extension)
    {
        //aqui podemos añadir las extensiones que deseemos permitir
        $extensiones = array("xml");
        if(in_array(strtolower($extension), $extensiones))
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    /**
    *funcion que comprueba si el archivo existe, si es asi, iteramos en un loop
    *y conseguimos un nuevo nombre para el, finalmente lo retornamos
    *@access private
    *@param array
    *@return array - archivo con el nuevo nombre
    */
    private function checkExists($file)
    {
        //asignamos de nuevo el nombre al archivo
        $i = 0;
        $var=TRUE;
        //mientras el archivo exista entramos
        while(file_exists('temporal/'.$file))
        {
            $i++;
            $var=FALSE;
            //$archivo = $file[0]."(".$i.")".".".end($file);
        }
        //devolvemos el nuevo nombre de la imagen, si es que ha
        //entrado alguna vez en el loop, en otro caso devolvemos el que
        //ya tenia
        return $var;
    }
}
//$files = $_FILES['files']['name'];
//echo '<pre>', print_r($_FILES),'</pre>';
$files = $_FILES['files']['name'];
//creamos una nueva instancia de la clase multiupload
$upload = new MultiplesArchivos();
//llamamos a la funcion upFiles y le pasamos el array de campos file del formulario
$isUpload = $upload->subirArchivos($files);
?>
