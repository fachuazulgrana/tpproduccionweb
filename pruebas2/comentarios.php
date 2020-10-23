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

?>
  <div class="content">
    <h1 class="page-header">Comentarios</h1>
    <h2 class="sub-header">Listado <a href=""><button type="button">AGREGAR</button></a></h2> <!-- Acá hay que hacer que funcione el botón -->
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Calificacion</th>
            <th>Comentario</th>
            <th>Fecha</th>
            <th>ip</th>
            <th>Productos_id</th>
            <th>Activo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($Comentarios->getComent() as $coment) {
          ?> 
            <tr>
              <td><?php echo $coment['id']; ?></td>
              <td><?php echo $coment['nombre']; ?></td>
              <td><?php echo $coment['email']; ?></td>
              <td><?php echo $coment['calificacion']; ?></td>
              <td><?php echo $coment['comentario']; ?></td>
              <td><?php echo $coment['fecha']; ?></td>
              <td><?php echo $coment['ip']; ?></td>
              <td><?php echo $coment['productos_id']; ?></td>
              <td><?php echo $coment['activo']; ?></td>


              <td>
                <a href=""><button type="button">Modificar</button></a> <!-- Acá hay que hacer que funcione el botón -->
                <a href=""><button type="button">Borrar</button></a> <!-- Acá hay que hacer que funcione el botón -->
              </td>

            </tr>

          <?php
          }

          ?>
        </tbody>
      </table>

</body>
</html>
