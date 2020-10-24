<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "head_admin.php" ?>
    <title>Paises</title>
</head>

<body>

<?php 
$page = 'paises';
require_once("sidebar.php"); 

if (isset($_POST['formulario-pais'])) {
  if ($_POST['id'] > 0) {
    $Pais->edit($_POST);
  } else {
    $Pais->save($_POST);
  }
  header('Location: paises.php');
}

if (isset($_GET['del'])) {
  $resp = $Pais->del($_GET['del']);
  if ($resp == 1) {
    header('Location: paises.php');
  }
  echo '<script>alert("' . $resp . '");</script>';
}
?>

<div class="content">
    <h1 class="page-header">Paises</h1>
    <h2 class="sub-header">Listado <a href="paises_ae.php"><button type="button">AGREGAR</button></a></h2> <!-- Acá hay que hacer que funcione el botón -->
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Continente_id</th>
            <th>Activo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($Pais->getPaises() as $pais) {
          ?> 
            <tr>
              <td><?php echo $pais['id']; ?></td>
              <td><?php echo $pais['nombre']; ?></td>
              <td><?php echo $pais['continentes_id']; ?></td>
              <td><?php echo $pais['activo']; ?></td>


              <td>
                <a href="paises_ae.php?edit=<?php echo $pais['id'] ?>"><button type="button">Modificar</button></a> <!-- Acá hay que hacer que funcione el botón -->
                <a href="paises.php?del=<?php echo $pais['id'] ?>"><button type="button">Borrar</button></a> <!-- Acá hay que hacer que funcione el botón -->
              </td>

            </tr>

          <?php
          }

          ?>
        </tbody>
      </table>

</div>

</body>
</html>
