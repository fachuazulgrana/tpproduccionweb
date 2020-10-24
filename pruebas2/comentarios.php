<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "head_admin.php" ?>
    <title>Promociones</title>
</head>

<body>

<?php 
$page = 'comentarios';
require_once("sidebar.php");

if (isset($_POST['formulario-comentario'])) {
  if ($_POST['id'] > 0) {
    $Comentarios->edit($_POST);
  } else {
    $Comentarios->save($_POST);
  }
  header('Location: comentarios.php');
}

if (isset($_GET['del'])) {
  $resp = $Comentarios->del($_GET['del']);
  if ($resp == 1) {
    header('Location: comentarios.php');
  }
  echo '<script>alert("' . $resp . '");</script>';
}
?>
  <div class="content">
    <h1 class="page-header">Comentarios</h1>
    <h2 class="sub-header">Listado <a href="comentarios_ae.php"><button type="button">AGREGAR</button></a></h2> <!-- Acá hay que hacer que funcione el botón -->
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>producto_id</th>
            <th>Calificacion</th>
            <th>Comentario</th>
            <th>Fecha</th>
            <th>Producto</th>
            <th>Activo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($Comentarios->getComent() as $coment) {
          ?> 
            <tr>
              <td><?php echo $coment['productos_id']; ?></td>
              <td><?php echo $coment['calificacion']; ?></td>
              <td><?php echo $coment['comentario']; ?></td>
              <td><?php echo $coment['fecha']; ?></td>
              <td><?php echo $Productos->getProdName(); ?></td>
              <td><?php echo $coment['activo']; ?></td>


              <td>
                <a href="comentarios_ae.php?edit=<?php echo $coment['id'] ?>"><button type="button">Modificar</button></a> <!-- Acá hay que hacer que funcione el botón -->
                <a href="comentarios.php?del=<?php echo $coment['id'] ?>"><button type="button">Borrar</button></a> <!-- Acá hay que hacer que funcione el botón -->
              </td>

            </tr>

          <?php
          }

          ?>
        </tbody>
      </table>

</body>
</html>