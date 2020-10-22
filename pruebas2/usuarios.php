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
  <h2>Responsive Sidebar Example</h2>
  <p>This example use media queries to transform the sidebar to a top navigation bar when the screen size is 700px or less.</p>
  <p>We have also added a media query for screens that are 400px or less, which will vertically stack and center the navigation links.</p>
 
 <!--
    public function login($data){
      $sql = "SELECT id_usuario,nombre,apellido,email,usuario,clave,activo,salt
        FROM usuarios WHERE activo = 1 AND usuario = '".$data['usuario']."'";
      $datos = $this->con->query($sql)->fetch(PDO::FETCH_ASSOC);
      if(isset($datos['id_usuario'])){
        if($this->encrypt($data['clave'],$datos['salt']) == $datos['clave']){
          $_SESSION['usuario'] = $datos;
          $query = "SELECT cod, seccion FROM permisos
            INNER JOIN perfil_permisos ON (perfil_permisos.permiso_id = permisos.id)
            INNER JOIN usuarios_perfiles ON (usuarios_perfiles.perfil_id = perfil_permisos.perfil_id)
            WHERE usuario_id = ".$datos['id_usuario'];

          $permisos = array();
          foreach($this->con->query($query) as $key => $value){
            $permisos['cod'][$key] = $value['cod'];
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
