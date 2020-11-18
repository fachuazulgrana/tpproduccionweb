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
    header('Location: paises.php?page=1&orden=&limit=');
  }

  if (isset($_GET['del'])) {
    $resp = $Pais->del($_GET['del']);
    if ($resp == 1) {
      header('Location: paises.php?page=1&orden=&limit=');
    }
    echo '<script>alert("' . $resp . '");</script>';
  }

  $pageNumber = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
  $prev = $pageNumber - 1;
  $next = $pageNumber + 1;
  ?>

  <div class="content">
    <h1 class="page-header">Paises</h1>
    <div class="row justify-content-between">
      <div class="col-6">
        <h2 class="sub-header">Listado <?php if (in_array('pais.add', $_SESSION['usuario']['permisos']['code'])) { ?>
          <a href="paises_ae.php?page="<?php isset($_GET['page']) ? $_GET['page'] : '' ?> >
            <button type="button" class="btn btn-success btn-xs">AGREGAR</button>
          </a><?php } ?>
        </h2> <!-- Acá hay que hacer que funcione el botón -->
      </div>

      <div class="col-6">
        <div class="row flex-row justify-content-end">
          <h2 class="sub-header">Filtro</h2>
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
              <input type="hidden" name="ordenPor" value="<?php echo isset($_GET['ordenPor']) ? $_GET['ordenPor'] : '' ?>">
          </form>

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
            <input type="hidden" name="ordenPor" value="<?php echo isset($_GET['ordenPor']) ? $_GET['ordenPor'] : '' ?>">
          </form>
        </div>
      </div>
    </div>
      <?php
        $pagStart = ($pageNumber - 1) * $limit;
        $pagesPerPais = ceil($Pais->getPagination() / $limit); //acá
      ?>

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
          foreach ($Pais->getPaises($limit, $pagStart) as $pais) {
          ?>
            <tr>
              <td><?php echo $pais['id']; ?></td>
              <td><?php echo $pais['nombre']; ?></td>
              <td><?php echo $Continente->getContName($pais); ?></td>
              <td><?php echo ($pais['activo']) ? 'si' : 'no'; ?></td>

              <td>
                <?php if (in_array('pais.edit', $_SESSION['usuario']['permisos']['code'])) { ?>
                  <a href="paises_ae.php?edit=<?php echo $pais['id'] . "&page=" . $_GET['page'] ?>">
                    <button type="button" class="btn btn-warning btn-xs">Modificar</button>
                  </a>
                <?php } ?>
                <?php if (in_array('pais.del', $_SESSION['usuario']['permisos']['code'])) { ?>
                  <a href="paises.php?del=<?php echo $pais['id'] ?>">
                    <button type="button" class="btn btn-danger btn-xs">Borrar</button>
                  </a> <!-- Acá hay que hacer que funcione el botón -->
                <?php } ?>
              </td>

            </tr>

          <?php
          }
          ?>
        </tbody>
      </table>
      

      <nav aria-label="Page navigation example mt-5">
        <ul class="pagination justify-content-center">
          <li class="page-item <?php if ($pageNumber <= 1) {
              echo 'disabled';
          } ?>">
              <a class="page-link" 
              href="<?php if ($pageNumber <= 1) {
              echo '#';
          } else {
              echo "?page=" . $prev . "&orden=" . $_GET['orden'] . "&limit=" . $_GET['limit'];
          } ?>"
              >
                Previous
              </a>
          </li>

          <?php for ($i = 1; $i <= $pagesPerPais; $i++) { ?>
            <li class="page-item <?php if ($pageNumber == $i) {
              echo 'active';
          } ?>">
              <a class="page-link" 
              href="paises.php?page=<?php echo $i . "&orden=" . $_GET['orden'] . "&limit=" . $_GET['limit'] ?>">
              <?php echo $i; ?> 
              </a>
            </li>
          <?php } ?>

          <li class="page-item <?php if ($pageNumber >= $pagesPerPais) {
              echo 'disabled';
          } ?>">
            <a class="page-link"
                href="<?php
                if ($pageNumber >= $pagesPerPais) {
                    echo '#';
                } else {
                    echo "?page=". $next . "&orden=" . $_GET['orden'] . "&limit=" . $_GET['limit'];
                } ?>">Next
            </a>
          </li>
        </ul>
        </nav>

    </div>
  </div>

</body>

</html>