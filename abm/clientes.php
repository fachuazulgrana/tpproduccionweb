<!DOCTYPE html>
<html lang="es">

<head>
  <?php
  require_once("includes/head_admin.php");
  require_once('../app/Cliente.php');

  $Usuario = new Usuario($con);
  $page = "clientes";

  ?>
  <title>Clientes</title>
  <?php if (!in_array('cli', $_SESSION['usuario']['permisos']['seccion'])) {
    header('Location: home.php');
  } ?>

</head>
<?php
require_once("includes/sidebar.php");
if (isset($_GET['edit'])) {
  $Cliente->edit($_GET['edit']);
  header('Location: clientes.php');
}

if (isset($_GET['del'])) {
  $resp = $Cliente->del($_GET['del']);
  if ($resp == 1) {
    header('Location: clientes.php');
  } else {
    echo '<script>alert("' . $resp . '");</script>';
    header('Location: clientes.php');
  }
}
?>

<body>
  <div class="content">
    <h1 class="page-header">Usuarios</h1>
    <h2 class="sub-header">Listado</h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Activo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($Cliente->getClientes() as $cliente) { ?>
            <tr>
              <td><?php echo $cliente['id_usuario']; ?></td>
              <td><?php echo $cliente['user']; ?></td>
              <td><?php echo $cliente['nombre']; ?></td>
              <td><?php echo $cliente['apellido']; ?></td>
              <td><?php echo $cliente['email']; ?></td>
              <td><?php echo ($cliente['activo']) ? 'si' : 'no'; ?></td>
              <td>
                <?php if (in_array('cli.edit', $_SESSION['usuario']['permisos']['code'])) { ?>
                  <a href="clientes.php?edit=<?php echo $cliente['id_usuario'] ?>"><button type="button" class="btn btn-warning btn-xs"><?php echo ($cliente['activo'] == 1) ? 'Desactivar' : 'Activar'; ?></button></a>
                <?php } ?>
                <?php if (in_array('cli.del', $_SESSION['usuario']['permisos']['code'])) { ?>
                  <a href="clientes.php?del=<?php echo $cliente['id_usuario'] ?>"><button type="button" class="btn btn-danger btn-xs">Borrar</button></a>
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