<!DOCTYPE html>
<html lang="es">

<head>
  <?php
  require_once("head_admin.php");
  require_once('../app/Perfil.php');
  require_once '../pruebas/pdo.php';

  /*require_once('../pruebas/mysql-login.php');

  try{
    $con = new PDO('mysql:host='.$hostname.';dbname='.$database.';port='.$puerto, $username, $password);
  }catch (PDOException $e){
    print "¡Error!: " . $e->getMessage();
    die();
  }*/


  $Perfil = new Perfil($con);
  $page = "perfiles";
  ?>
  <title>Perfiles</title>

</head>

<?php require_once "sidebar.php"; 

if (isset($_POST['formulario-perfiles'])) {
  if ($_POST['id_perfil'] > 0) {
    $Perfil->edit($_POST);
  } else {
    $Perfil->save($_POST);
  }
  header('Location: perfiles.php');
}

if (isset($_GET['del'])) {
  $resp = $Perfil->del($_GET['del']);
  if ($resp == 1) {
    header('Location: perfiles.php');
  }
  echo '<script>alert("' . $resp . '");</script>';
}
?>

<body>
  <div class="content">
    <h1 class="page-header">Perfiles</h1>
    <h2 class="sub-header">Listado <a href="perfiles_ae.php"><button type="button">AGREGAR</button></a></h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($Perfil->getList() as $perfil) { ?>
            <tr>
              <td><?php echo $perfil['id_perfil']; ?></td>
              <td><?php echo $perfil['nombre']; ?></td>
              <td>
                <a href="perfiles_ae.php?edit=<?php echo $perfil['id_perfil'] ?>"><button type="button">Modificar</button></a>
                <a href="perfiles.php?del=<?php echo $perfil['id_perfil'] ?>"><button type="button">Borrar</button></a>
              </td>
            </tr>

          <?php
          }

          ?>
        </tbody>
      </table>
</body>

</html>
