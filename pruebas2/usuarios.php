<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "head_admin.php" ?>
    <title>Usuarios</title>
</head>

<body>

<?php 
$page = 'usuarios';
require_once "sidebar.php" 
?>

<div class="content">
  <h2>Usuarios</h2>
 
 <!--
    public function login($data){
      $sql = "SELECT id_usuario,nombre,apellido,user,password,email,activo,salt
        FROM usuarios WHERE activo = 1 AND usuario = '".$data['usuario']."'";
      $datos = $this->con->query($sql)->fetch(PDO::FETCH_ASSOC);
      if(isset($datos['id_usuario'])){
        if($this->encrypt($data['clave'],$datos['salt']) == $datos['clave']){
          $_SESSION['usuario'] = $datos;
          $query = "SELECT code, seccion FROM permisos
            INNER JOIN perfil_permiso ON (perfil_permiso.permiso_id = permisos.permisos_id)
            INNER JOIN usuario_perfiles ON (usuario_perfiles.perfil_id = perfil_permiso.perfil_id)
            WHERE usuario_id = ".$datos['id_usuario'];

          $permisos = array();
          foreach($this->con->query($query) as $key => $value){
            $permisos['code'][$key] = $value['code'];
            $permisos['seccion'][$key] = $value['seccion'];
          }

          $_SESSION['usuario']['permisos'] = $permisos;
        }
      }
    }

    public function notLogged(){
      if(!isset($_SESSION['usuario'])){
        return true;
      }
      return false;
    }
  -->

</div>

</body>
</html>
