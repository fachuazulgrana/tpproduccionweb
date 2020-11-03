<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("head_admin.php") ?>
    <title>Productos</title>
    <?php if (!in_array('prod', $_SESSION['usuario']['permisos']['seccion'])) {
    header('Location: home.php');
  } ?>

</head>

<body>

<?php 
$page = 'productos';
require_once "sidebar.php" 
?>

<div class="content">
    <h1 class="page-header">Productos</h1>
    <h2 class="sub-header">Listado <?php if (in_array('prod.add', $_SESSION['usuario']['permisos']['code'])) { ?><a href="productos_ae.php"><button type="button" class="btn btn-success btn-xs">AGREGAR</button></a><?php } ?></h2> <!-- Acá hay que hacer que funcione el botón -->
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>País</th>
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
              <td><?php echo $Pais->getPaisName($prod);?></td>
              <td><?php echo $prod['precio']; ?></td>
              <td><?php echo ($prod['activo']) ? 'si' : 'no'; ?></td>

              <td>
              <?php if (in_array('com.see', $_SESSION['usuario']['permisos']['code'])) { ?>
                <a href="productos_comentarios.php?id=<?php echo $prod['id'] ?>"><button type="button" class="btn btn-primary btn-xs">Acceder</button></a> <!-- Acá hay que hacer que funcione el botón -->
                <?php } ?>
              </td>

              <td>
              <?php if (in_array('prod.edit', $_SESSION['usuario']['permisos']['code'])) { ?>
                <a href="productos_ae.php?edit=<?php echo $prod['id'] ?>"><button type="button" class="btn btn-warning btn-xs">Modificar</button></a> <!-- Acá hay que hacer que funcione el botón -->
                <?php } ?>
                <?php if (in_array('prod.del', $_SESSION['usuario']['permisos']['code'])) { ?>
                <a href="productos.php?del=<?php echo $prod['id'] ?>"><button type="button" class="btn btn-danger btn-xs">Borrar</button></a> <!-- Acá hay que hacer que funcione el botón -->
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
