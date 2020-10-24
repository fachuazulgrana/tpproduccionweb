<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("head_admin.php") ?>
    <title>Productos</title>
</head>

<body>

<?php 
$page = 'productos';
require_once "sidebar.php" 
?>

<div class="content">
    <h1 class="page-header">Comentarios de X</h1>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Rank</th>
            <th>Comentario</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($Comentarios->getComent() as $coment) { //Acá hay que poner para que se vean todos los productos
          ?> 
            <tr>
              <td><?php echo $coment['fecha']; ?></td>
              <td><?php echo $coment['calificacion']; ?></td>
              <td><?php echo $coment['comentario']; ?></td>
            </tr>

          <?php
          }

          ?>
        </tbody>
      </table>

</body>
</html>
