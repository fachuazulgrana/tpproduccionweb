<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "head_admin.php" ?>
    <title>Continentes</title>
    <?php if (!in_array('cont', $_SESSION['usuario']['permisos']['seccion'])) {
    header('Location: home.php');
  } ?>
</head>

<body>

<?php 
$page = 'continentes';
require_once("sidebar.php");

if (isset($_POST['formulario-continente'])) {
  if ($_POST['id'] > 0) {
    $Continente->edit($_POST);
  } else {
    $Continente->save($_POST);
  }
  header('Location: continentes.php');
}

if (isset($_GET['del'])) {
  $resp = $Continente->del($_GET['del']);
  if ($resp == 1) {
    header('Location: continentes.php');
  }
  echo '<script>alert("' . $resp . '");</script>';
}
?>

<div class="content">
    <h1 class="page-header">Continentes</h1>
    <h2 class="sub-header">Listado <a href="continentes_ae.php"><button type="button" class="btn btn-success btn-xs">AGREGAR</button></a></h2> <!-- Acá hay que hacer que funcione el botón -->
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Activo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($Continente->getCont() as $cont) {
          ?> 
            <tr>
              <td><?php echo $cont['id']; ?></td>
              <td><?php echo $cont['nombre']; ?></td>
              <td><?php echo ($cont['activo']) ? 'si' : 'no'; ?></td>


              <td>
                <a href="continentes_ae.php?edit=<?php echo $cont['id'] ?>"><button type="button" class="btn btn-warning btn-xs">Modificar</button></a> <!-- Acá hay que hacer que funcione el botón -->
                <a href="continentes.php?del=<?php echo $cont['id'] ?>"><button type="button" class="btn btn-danger btn-xs">Borrar</button></a> <!-- Acá hay que hacer que funcione el botón -->
              </td>

            </tr>

          <?php
          }

          ?>
        </tbody>
      </table>

</body>
</html>
