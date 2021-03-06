<!DOCTYPE html>
<html lang="es">

<head>
  <?php
  require_once("includes/head_admin.php");
  require_once('../app/Usuarios.php');

  $Usuario = new Usuario($con);
  $page = "usuarios";

  ?>
  <title>Usuarios</title>
  <?php if (!in_array('user', $_SESSION['usuario']['permisos']['seccion'])) {
    header('Location: home.php');
  } ?>

</head>
<?php require_once "includes/sidebar.php";
if (isset($_POST['formulario-usuarios'])) {
  if ($_POST['id_usuario'] > 0) {
    $Usuario->edit($_POST);
  } else {
    $resp =  $Usuario->save($_POST);
    if ($resp != 1) {
      echo '<script>alert("' . $resp . '");</script>';
      header('Location: usuarios.php');
    } else {
      header('Location: usuarios.php');
    }
  }
}
if (isset($_GET['del'])) {
  $resp = $Usuario->del($_GET['del']);
  if ($resp == 1) {
    header('Location: usuarios.php');
  } else {
    echo '<script>alert("' . $resp . '");</script>';
    header('Location: usuarios.php');
  }
}
?>

<body>
  <div class="content">
    <h1 class="page-header">Usuarios</h1>
    <h2 class="sub-header">Listado <?php if (in_array('user.add', $_SESSION['usuario']['permisos']['code'])) { ?><a href="usuarios_ae.php"><button type="button" class="btn btn-success btn-xs">AGREGAR</button></a><?php } ?></h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Perfil</th>
            <th>Activo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($Usuario->getUsuarios() as $usuario) { ?>
            <tr>
              <td><?php echo $usuario['id_usuario']; ?></td>
              <td><?php echo $usuario['usuario']; ?></td>
              <td><?php echo $usuario['nombre']; ?></td>
              <td><?php echo $usuario['apellido']; ?></td>
              <td><?php echo $usuario['email']; ?></td>
              <td><?php echo isset($usuario['perfiles']) ? implode(', ', $usuario['perfiles']) : 'No tiene perfiles asignados'; ?></td>
              <td><?php echo ($usuario['activo']) ? 'si' : 'no'; ?></td>
              <td>


                <?php if (in_array('user.edit', $_SESSION['usuario']['permisos']['code'])) { ?>
                  <a href="usuarios_ae.php?edit=<?php echo $usuario['id_usuario'] ?>"><button type="button" class="btn btn-warning btn-xs">Modificar</button></a>
                <?php } ?>


                <?php if (in_array('user.del', $_SESSION['usuario']['permisos']['code'])) { ?>
                  <a href="usuarios.php?del=<?php echo $usuario['id_usuario'] ?>"><button type="button" class="btn btn-danger btn-xs">Borrar</button></a>
                <?php } ?>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
</body>

</html>