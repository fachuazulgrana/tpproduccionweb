<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "head_admin.php" ?>
    <title>Continentes</title>
</head>

<body>

<?php 
$page = 'continentes';
require_once("sidebar.php"); 
?>

<div class="content">
    <h1 class="page-header">Continentes</h1>
    <h2 class="sub-header">Listado <a href=""><button type="button">AGREGAR</button></a></h2> <!-- Acá hay que hacer que funcione el botón -->
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
              <td><?php echo $cont['activo']; ?></td>


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
