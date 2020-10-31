<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once "head_admin.php" ?>
  <title>Paises</title>
  <?php if (!in_array('pais', $_SESSION['usuario']['permisos']['seccion'])) {
    header('Location: home.php');
  } ?>
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
    <h2 class="sub-header">Listado <?php if (in_array('pais.add', $_SESSION['usuario']['permisos']['code'])) { ?><a href="paises_ae.php"><button type="button" class="btn btn-success btn-xs">AGREGAR</button></a><?php } ?></h2> <!-- Acá hay que hacer que funcione el botón -->
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Continente</th>
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
              <td><?php echo $Continente->getContName($pais); ?></td>
              <td><?php echo ($pais['activo']) ? 'si' : 'no'; ?></td>


              <td>
                <?php if (in_array('pais.edit', $_SESSION['usuario']['permisos']['code'])) { ?>
                  <a href="paises_ae.php?edit=<?php echo $pais['id'] ?>"><button type="button" class="btn btn-warning btn-xs">Modificar</button></a>
                <?php } ?>
                <?php if (in_array('pais.del', $_SESSION['usuario']['permisos']['code'])) { ?>
                  <a href="paises.php?del=<?php echo $pais['id'] ?>"><button type="button" class="btn btn-danger btn-xs">Borrar</button></a> <!-- Acá hay que hacer que funcione el botón -->
                <?php } ?>
              </td>

            </tr>

          <?php
          }
          ?>
        </tbody>
      </table>
      
      <div class="center">
        <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="paises.php?1">1</a>
        <a href="paises.php?2">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#">&raquo;</a>
        </div>
      </div>

    </div>
  </div>

</body>

</html>