<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once "head_admin.php" ?>
  <title>Comentarios</title>
  <?php if (!in_array('com', $_SESSION['usuario']['permisos']['seccion'])) {
    header('Location: home.php');
  } ?>
</head>

<body>

  <?php
  $page = 'comentarios';
  require_once("sidebar.php");

  if (isset($_GET['edit'])) {
    $Comentarios->edit($_GET['edit'], $coment['activo']);
    header('Location: comentarios.php?page=1&orden=&limit=');
  }

  if (isset($_GET['dinamico_id'])) {
    header('Location: tabla_comentario_dinamico.php');
  }

  if (isset($_GET['del'])) {
    $resp = $Comentarios->del($_GET['del']);
    if ($resp == 1) {
      header('Location: comentarios.php?page=1&orden=&limit=');
    }
    echo '<script>alert("' . $resp . '");</script>';
  }

  $pageNumber = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
  $prev = $pageNumber - 1;
  $next = $pageNumber + 1;
  ?>
  <div class="content">
    <h1 class="page-header">Comentarios</h1>

    <div class="row justify-content-between">
      <div class="col-1">
        <h2 class="sub-header">Filtro</h2>
      </div>
      <div class="col-3">
        <form action="" method="GET" class="mr-3">
          <input type="hidden" name="page" value="<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>">
          <?php
          !empty($_GET['orden']) ? $opcion4 = $_GET['orden'] : $opcion4 = ""
          ?>
          <select name="orden" class="custom-select custom-select-lg" id="orden" onchange="this.form.submit()">
            <option value="" <?php echo ($opcion4 == "") ? 'selected="selected"' : '' ?>> Mostrar Todo </option>
            <option value="1" <?php echo ($opcion4 == "1") ? 'selected="selected"' : '' ?>> Solo Activos </option>
            <option value="2" <?php echo ($opcion4 == "2") ? 'selected="selected"' : '' ?>> Solo Inactivos </option>
          </select>
          <input type="hidden" name="limit" value="<?php echo isset($_GET['limit']) ? $_GET['limit'] : '' ?>">
          <!-- <input type="hidden" name="ordenPor" value="<?php echo isset($_GET['ordenPor']) ? $_GET['ordenPor'] : '' ?>"> -->
        </form>
      </div>

      <div class="col-6">
        <div class="row flex-row justify-content-end">

          <form action="" method="GET" class="mr-3">
            <input type="hidden" name="page" value="<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>">
            <?php
            $limit = "";
            !empty($_GET['limit']) ? $limit = $_GET['limit'] : $limit = "10"
            ?>
            <input type="hidden" name="orden" value="<?php echo isset($_GET['orden']) ? $_GET['orden'] : '' ?>">
            <select name="limit" class="custom-select custom-select-lg" id="limit" onchange="this.form.submit()">
              <option value="10" <?php echo ($limit == "10") ? 'selected="selected"' : '' ?>>Mostrar 10 </option>
              <option value="20" <?php echo ($limit == "20") ? 'selected="selected"' : '' ?>>Mostrar 20 </option>
              <option value="30" <?php echo ($limit == "30") ? 'selected="selected"' : '' ?>>Mostrar 30 </option>
            </select>
            <!-- <input type="hidden" name="ordenPor" value="<?php echo isset($_GET['ordenPor']) ? $_GET['ordenPor'] : '' ?>"> -->
          </form>

        </div>
      </div>
    </div>
    <?php
    $pagStart = ($pageNumber - 1) * $limit;
    $pagesPerCom = ceil($Comentarios->getPagination() / $limit);
    ?>

    <br>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Producto</th>
            <th>Calificacion</th>
            <th>Comentario</th>
            <th>Fecha</th>
            <th>Activo</th>
            <th>Campos Extras</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($Comentarios->getComent($limit, $pagStart) as $coment) {
          ?>
            <tr>
              <td><?php echo $Productos->getProdName($coment); ?></td>
              <td><?php echo $coment['calificacion']; ?></td>
              <td><?php echo $coment['comentario']; ?></td>
              <td><?php echo $coment['fecha']; ?></td>
              <td><?php echo ($coment['activo']) ? 'si' : 'no'; ?></td>

              <td>
                <?php if ($ComentariosDinamicos->validadorBoton($coment['id']) == 1) { ?>
                  <?php if (in_array('com.edit', $_SESSION['usuario']['permisos']['code'])) { ?>
                    <a href="tabla_comentario_dinamico.php?dinamico_id=<?php echo $coment['id'] ?>"><button type="button" class="btn btn-success btn-xs">Ver</button></a>
                <?php }
                } ?>
              </td>

              <td>
                <?php if (in_array('com.edit', $_SESSION['usuario']['permisos']['code'])) { ?>
                  <a href="comentarios.php?edit=<?php echo $coment['id'] . "&page=" . $_GET['page'] . "&orden=" . $_GET['orden'] . "&limit=" . $_GET['limit'] ?>">
                    <button type="button" class="btn btn-warning btn-xs"><?php echo ($coment['activo'] == 1) ? 'Desactivar' : 'Activar'; ?></button>
                  </a>
                <?php } ?>
                <?php if (in_array('com.del', $_SESSION['usuario']['permisos']['code'])) { ?>
                  <a href="comentarios.php?del=<?php echo $coment['id'] ?>" <?php echo "&page=" . $prev . "&orden=" . $_GET['orden'] . "&limit=" . $_GET['limit'] ?>>
                    <button type="button" class="btn btn-danger btn-xs">Borrar</button>
                  </a>
                <?php } ?>
              </td>


            </tr>

          <?php
          }

          ?>
        </tbody>
      </table>

      <a href="comentarios_dinamicos.php"><button type="button" class="btn btn-success btn-xs"><?php echo 'Agregar Campo Dinámico'; ?></button></a>

      <nav aria-label="Page navigation example mt-5">
        <ul class="pagination justify-content-center">
          <li class="page-item <?php if ($pageNumber <= 1) {
                                  echo 'disabled';
                                } ?>">
            <a class="page-link" href="<?php if ($pageNumber <= 1) {
                                          echo '#';
                                        } else {
                                          echo "?page=" . $prev . "&orden=" . $_GET['orden'] . "&limit=" . $_GET['limit'];
                                        } ?>">
              Previous
            </a>
          </li>

          <?php for ($i = 1; $i <= $pagesPerCom; $i++) { ?>
            <li class="page-item <?php if ($pageNumber == $i) {
                                    echo 'active';
                                  } ?>">
              <a class="page-link" href="comentarios.php?page=<?php echo $i . "&orden=" . $_GET['orden'] . "&limit=" . $_GET['limit'] ?>">
                <?php echo $i; ?>
              </a>
            </li>
          <?php } ?>

          <li class="page-item <?php if ($pageNumber >= $pagesPerCom) {
                                  echo 'disabled';
                                } ?>">
            <a class="page-link" href="<?php
                                        if ($pageNumber >= $pagesPerCom) {
                                          echo '#';
                                        } else {
                                          echo "?page=" . $next . "&orden=" . $_GET['orden'] . "&limit=" . $_GET['limit'];
                                        } ?>">Next
            </a>
          </li>
        </ul>
      </nav>
</body>

</html>