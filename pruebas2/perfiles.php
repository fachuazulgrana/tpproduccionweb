<!DOCTYPE html>
<html lang="es">

<head>
  <?php
  require_once("head_admin.php");
  require_once('../app/Perfil.php');


  $Perfil = new Perfil($con);
  $page = "perfiles";
  ?>
  <title>Perfiles</title>
  <?php if (!in_array('perf', $_SESSION['usuario']['permisos']['seccion'])) {
    header('Location: home.php');
  } ?>

</head>

<?php require_once "sidebar.php";

if (isset($_POST['formulario-perfiles'])) {
  if ($_POST['id_perfil'] > 0) {
    $Perfil->edit($_POST);
  } else {
    $Perfil->save($_POST);
  }
  header('Location: perfiles.php');
}

if (isset($_GET['del'])) {
  $resp = $Perfil->del($_GET['del']);
  if ($resp == 1) {
    header('Location: perfiles.php');
  }
  echo '<script>alert("' . $resp . '");</script>';
}
?>

<body>
  <div class="content">
    <h1 class="page-header">Perfiles</h1>
    <h2 class="sub-header">Listado <?php if (in_array('perf.add', $_SESSION['usuario']['permisos']['code'])) { ?><a href="perfiles_ae.php"><button type="button" class="btn btn-success btn-xs">AGREGAR</button></a><?php } ?></h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($Perfil->getList() as $perfil) { ?>
            <tr>
              <td><?php echo $perfil['id_perfil']; ?></td>
              <td><?php echo $perfil['nombre']; ?></td>
              <td>
                <?php if (in_array('perf.edit', $_SESSION['usuario']['permisos']['code'])) { ?>
                  <a href="perfiles_ae.php?edit=<?php echo $perfil['id_perfil'] ?>"><button type="button" class="btn btn-warning btn-xs">Modificar</button></a>
                <?php } ?>
                <?php if (in_array('perf.del', $_SESSION['usuario']['permisos']['code'])) { ?>
                  <a href="perfiles.php?del=<?php echo $perfil['id_perfil'] ?>"><button type="button" class="btn btn-danger btn-xs">Borrar</button></a>
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