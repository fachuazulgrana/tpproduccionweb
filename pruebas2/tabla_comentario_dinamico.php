<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "head_admin.php" ?>
    <title>Comentarios Dinamicos</title>
    <?php if (!in_array('com', $_SESSION['usuario']['permisos']['seccion'])) {
      header('Location: home.php');
    } ?>
</head>

<body>

<?php
$page = 'tabla_comentario_dinamico';
require_once("sidebar.php");

$dinamicos = $ComentariosDinamicos->getByProd($_GET['dinamico_id']);

/* if (isset($_POST['formulario-continente'])) {
    if ($_POST['id'] > 0) {
        $Continente->edit($_POST);
    } else {
        $Continente->save($_POST);
    }
    header('Location: continentes.php');
}

if (isset($_GET['del'])) {
    $resp = $Continente->del($_GET['del']);
    if ($resp == 1) {
        header('Location: continentes.php');
    }
    echo '<script>alert("' . $resp . '");</script>';
} */
?>

<div class="content">
    <h1 class="page-header">Comentarios Dinamicos de </h1>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Tipo de Campo</th>
            <th>Contendio</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($dinamicos as $din) {
              ?> 
            <tr>
              <td><?php echo $din['id']; ?></td>
              <td><?php echo $din['label']; ?></td>
              <td><?php echo $din['informacion'] ?></td>

            </tr>

          <?php
          }

          ?>
        </tbody>
      </table>
      <a href="comentarios.php"><button type="button" class="btn btn-success btn-xs"><?php echo 'Volver a Comentarios'; ?></button></a>

</body>
</html>
