<?php
/**
*
* Realiza la autenticación de el usuario
*
* @author Ricardo Pascual
* @author https://github.com/Ryszardp
* @param String, String
* @return String
* recibe el rfc y la contraseña del usuario por POST
* regresa un arreglo asociado a una variable de sesión
* en caso contrario devuelve codigo html el cual es agregado por js
**/
if (!empty($_POST['usuario']) and !empty($_POST['clave'])) {
    $datos = new Conexion();
    $contexto = $datos->real_escape_string($_POST['usuario']);
    $clave = SHA1($_POST['clave']);
    $sql = $datos->query("SELECT * FROM empleado WHERE rfc='$contexto' AND clave='$clave' AND activo=1 LIMIT 1;");

    if ($datos->filas($sql)>0) {
      if ($_POST['sesion']) { ini_set('session.cookie_lifetime', time() + (60*60*24)); }
        while($contexto = $datos->recorrer($sql)){
          $_SESSION['usuario'] = array(
            'id' => $contexto['id'],
            'nombres' => $contexto['nombres'],
            'apellido_p' => $contexto['apellido_p'],
            'rfc' => $contexto['rfc'],
            'puesto' => $contexto['puesto'],
            'departamento' => $contexto['departamento'],
            'correo' => $contexto['correo'],
            'permiso_tmp' => $contexto['permiso_tmp']
          );
        }
      echo 1;
    } else {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Credenciales incorrectas!!!</strong> </div>';
    }

    $datos->liberar($sql);
    $datos->close();
} else {
    echo '<div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>No puede haber Campos vacios</strong></div>';
}
?>
