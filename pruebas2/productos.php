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
require_once "sidebar.php";
include './functions/func.php';

if (isset($_POST['formulario-productos'])) {
    if ($_POST['id'] > 0) {
        $Productos->edit($_POST);
    } else {
        $Productos->save($_POST);
    }
    header('Location: productos.php?page=1&orden=&limit=');
}

if (isset($_GET['del'])) {
  $resp = $Productos->del($_GET['del']);
  if ($resp == 1) {
    header('Location: productos.php?page=1&orden=&limit=');
  }
  echo '<script>alert("' . $resp . '");</script>';
}

$pageNumber = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
$prev = $pageNumber - 1;
$next = $pageNumber + 1;
?>

<div class="content">
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <h1 class="page-header display-3 my-4">Productos</h1>
    </div>
    </div>
    <div class="row justify-content-between my-4">
      <div class="col-6">
        <h2 class="sub-header">Listado<?php if (in_array('prod.add', $_SESSION['usuario']['permisos']['code'])) { ?>
          <a href="productos_ae.php?page="<?php isset($_GET['page']) ? $_GET['page'] : '' ?> >
            <button type="button" class="btn btn-success btn-xs">AGREGAR</button>
          </a><?php } ?>
        </h2>
      </div>
      <div class="col-6">
        <div class="row flex-row justify-content-end">
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

          <form action="" method="GET" class="mr-3">
            <input type="hidden" name="page" value="<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>">
            <input type="hidden" name="orden" value="<?php echo isset($_GET['orden']) ? $_GET['orden'] : '' ?>">
            <input type="hidden" name="limit" value="<?php echo isset($_GET['limit']) ? $_GET['limit'] : '' ?>">
              <?php
              !empty($_GET['ordenPor']) ? $ordenPor = $_GET['ordenPor'] : $ordenPor = ""
              ?>
              <select name="ordenPor" class="custom-select custom-select-lg" id="ordenPor" onchange="this.form.submit()">
                <option value="" <?php echo ($ordenPor == "") ? 'selected="selected"' : '' ?>> Orden </option>
                <option value="ASC" <?php echo ($ordenPor == "ASC") ? 'selected="selected"' : '' ?>> A-Z </option>
                <option value="DESC" <?php echo ($ordenPor == "DESC") ? 'selected="selected"' : '' ?>> Z-A </option>
              </select>
          </form>
        </div>
      </div>
      
    </div>

      <?php
        $pagStart = ($pageNumber - 1) * $limit;
        $pagesPerProduct = ceil($Productos->getPagination() / $limit);
      ?>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Detalle</th>
            <th>País</th>
            <th>Precio</th>
            <th>Activo</th>
            <th>Destacado</th>
            <th>Comentarios</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($Productos->getProd($limit, $pagStart, $ordenPor) as $prod) { ?> 
            <tr>
              <td><?php echo $prod['id']; ?></td>
              <td><?php echo $prod['nombre']; ?></td>
              <td><?php echo $prod['descripcion']; ?></td>
              <td><?php echo $prod['detalle']; ?></td>
              <td><?php echo $Pais->getPaisName($prod);?></td>
              <td><?php echo $prod['precio']; ?></td>
              <td><?php echo ($prod['activo']) ? 'si' : 'no'; ?></td>
              <td><?php echo ($prod['destacado']) ? 'si' : 'no'; ?></td>

              <td>
              <?php if (in_array('com.see', $_SESSION['usuario']['permisos']['code'])) { ?>
                <a href="productos_comentarios.php?id=<?php echo $prod['id'] ?>">
                  <button type="button" class="btn btn-primary btn-xs">Acceder</button>
                </a>
                <?php } ?>
              </td>

              <td>
              <?php if (in_array('prod.edit', $_SESSION['usuario']['permisos']['code'])) { ?>
                <a href="productos_ae.php?edit=<?php echo $prod['id'] . "&page=" . $_GET['page'] ?>">
                  <button type="button" class="btn btn-warning btn-xs">Modificar</button>
                </a>
                <?php } ?>
                <?php if (in_array('prod.del', $_SESSION['usuario']['permisos']['code'])) { ?>
                <a href="productos.php?del=<?php echo $prod['id'] ?>">
                  <button type="button" class="btn btn-danger btn-xs">Borrar</button></a> 
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

          <?php for ($i = 1; $i <= $pagesPerProduct; $i++) { ?>
            <li class="page-item <?php if ($pageNumber == $i) {
              echo 'active';
          } ?>">
              <a class="page-link" 
              href="productos.php?page=<?php echo $i . "&orden=" . $_GET['orden'] . "&limit=" . $_GET['limit'] ?>">
              <?php echo $i; ?> 
              </a>
            </li>
          <?php } ?>

          <li class="page-item <?php if ($pageNumber >= $pagesPerProduct) {
              echo 'disabled';
          } ?>">
            <a class="page-link"
                href="<?php
                if ($pageNumber >= $pagesPerProduct) {
                    echo '#';
                } else {
                    echo "?page=". $next . "&orden=" . $_GET['orden'] . "&limit=" . $_GET['limit'];
                } ?>">Next
            </a>
          </li>
        </ul>
        </nav>
</div>

</body>
</html>