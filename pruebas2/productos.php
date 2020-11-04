<!DOCTYPE html>
<html lang="es">

<head>
  <?php 
  require_once("head_admin.php");
  if (!in_array('prod', $_SESSION['usuario']['permisos']['seccion'])) {
    header('Location: home.php');
  } ?>

  <title>Productos</title>
</head>

<body>

  <?php
  $page = 'productos';
  require_once "sidebar.php";

  if (isset($_POST['formulario-productos'])) {
    if ($_POST['id'] > 0) {
      $Productos->edit($_POST);
    } else {
      $Productos->save($_POST);
    }
    header('Location: productos.php');
  }

  if (isset($_GET['del'])) {
    $resp = $Productos->del($_GET['del']);
    if ($resp == 1) {
      header('Location: productos.php');
      echo '<script>alert("' . $resp . '");</script>';
    }
  }

  $limit = 25;
  $pageNumber = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
  $prev = $pageNumber - 1;
  $next = $pageNumber + 1;
  $pagStart = ($pageNumber - 1) * $limit;
  $pagesPerProduct = ceil($Productos->getPagination() / $limit);
  ?>


  <div class="content">
    <h1 class="page-header">Productos</h1>
    <h2 class="sub-header">Listado 
    <?php if (in_array('prod.add', $_SESSION['usuario']['permisos']['code'])) { ?>
      <a href="productos_ae.php?page=<?php echo $pageNumber ?>">
        <button type="button" class="btn btn-success btn-xs">AGREGAR</button>
      </a>
      <?php } ?>
    </h2> <!-- Acá hay que hacer que funcione el botón -->
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
          <?php foreach ($Productos->getProd($limit, $pagStart) as $prod) { ?>
            <tr>
              <td><?php echo $prod['nombre']; ?></td>
              <td><?php echo $prod['descripcion']; ?></td>
              <td><?php echo $Pais->getPaisName($prod); ?></td>
              <td><?php echo $prod['precio']; ?></td>
              <td><?php echo ($prod['activo']) ? 'si' : 'no'; ?></td>

              <td>
                <!-- Acá hay que hacer que funcione el botón -->
                <a href="productos_comentarios.php?id=<?php echo $prod['id'] ?>&page=<?php echo $pageNumber ?>"><button type="button" class="btn btn-primary btn-xs">Acceder</button></a>
              </td>

              <td>
                <!-- Acá hay que hacer que funcione el botón -->
                <?php if (in_array('prod.edit', $_SESSION['usuario']['permisos']['code'])) { ?>
                <a href="productos_ae.php?edit=<?php echo $prod['id'] ?>&page=<?php echo $pageNumber ?>"><button type="button" class="btn btn-warning btn-xs">Modificar</button></a>
                <?php } ?>
                <!-- Acá hay que hacer que funcione el botón -->
                <?php if (in_array('prod.del', $_SESSION['usuario']['permisos']['code'])) { ?>
                <a href="productos.php?del=<?php echo $prod['id'] ?>&page=<?php echo $pageNumber ?>"><button type="button" class="btn btn-danger btn-xs">Borrar</button></a>
                <?php } ?>
              </td>

            </tr>

          <?php } ?>
        </tbody>
      </table>

      <nav aria-label="Page navigation example mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if($pageNumber <= 1) echo 'disabled'; ?>">
                    <a class="page-link" 
                    href="<?php if($pageNumber <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>"
                    >
                      Previous
                    </a>
                </li>

                <?php for($i = 1; $i <= $pagesPerProduct; $i++ ) { ?>
                  <li class="page-item <?php if($pageNumber == $i) {echo 'active'; } ?>">
                      <a class="page-link" href="productos.php?page=<?php echo $i; ?>"> <?php echo $i; ?> </a>
                  </li>
                <?php } ?>

                <li class="page-item <?php if($pageNumber >= $pagesPerProduct) { echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($pageNumber >= $pagesPerProduct){ echo '#'; } else {echo "?page=". $next; } ?>">Next</a>
                </li>
            </ul>
        </nav>


</body>

</html>