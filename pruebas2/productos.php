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
    <h1 class="page-header">Productos</h1>
    <h2 class="sub-header">Listado <a href="productos_ae.php"><button type="button" class="btn btn-success btn-xs">AGREGAR</button></a></h2> <!-- Acá hay que hacer que funcione el botón -->
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Paises_id</th>
            <th>Precio</th>
            <th>Activo</th>
            <th>Comentarios</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($Productos->getProd() as $prod) { //Acá hay que poner para que se vean todos los productos
          ?> 
            <tr>
              <td><?php echo $prod['nombre']; ?></td>
              <td><?php echo $prod['descripcion']; ?></td>
              <td><?php echo $prod['paises_id']; ?></td>
              <td><?php echo $prod['precio']; ?></td>
              <td><?php echo $prod['activo']; ?></td>

              <td>
                <a href="productos_comentarios.php?id=<?php echo $prod['id'] ?>"><button type="button" class="btn btn-primary btn-xs">Acceder</button></a> <!-- Acá hay que hacer que funcione el botón -->
              </td>

              <td>
                <a href="productos_ae.php?edit=<?php echo $prod['id'] ?>"><button type="button" class="btn btn-warning btn-xs">Modificar</button></a> <!-- Acá hay que hacer que funcione el botón -->
                <a href="productos.php?del=<?php echo $prod['id'] ?>"><button type="button" class="btn btn-danger btn-xs">Borrar</button></a> <!-- Acá hay que hacer que funcione el botón -->
              </td>

            </tr>

          <?php
          }

          ?>
        </tbody>
      </table>

</body>
</html>
