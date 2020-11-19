<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "head_admin.php" ?>
        <title>Campos Dinamicos</title>
    <?php if (!in_array('prod', $_SESSION['usuario']['permisos']['seccion'])) {
        header('Location: home.php');
    } ?>
</head>

<body>
    <?php
    $page = 'campos_dinamicos';
    require_once "sidebar.php";

    if (isset($_POST['formulario-campos_dinamicos'])) {
      if ($_POST['id'] > 0) {
        $CamposDinamicos->edit($_POST);
      } else {
        $CamposDinamicos->save($_POST);
      }
      header('Location: campos_dinamicos.php');
    }
    
    if (isset($_GET['del'])) {
      $resp = $CamposDinamicos->del($_GET['del']);
      if ($resp == 1) {
        header('Location: campos_dinamicos.php');
      }
      echo '<script>alert("' . $resp . '");</script>';
    }
    ?>

    <div class="content">
        <div class="main container-fluid">
            <h1 class="page-header">Campos Dinámicos</h1>
            <h2 class="sub-header">Listado <?php if (in_array('prod.add', $_SESSION['usuario']['permisos']['code'])) { ?><a href="campos_dinamicos_ae.php"><button type="button" class="btn btn-success btn-xs">AGREGAR</button></a><?php } ?></h2> <!-- Acá hay que hacer que funcione el botón -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre del Campo</th>
                            <th>Tipo de Campo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($CamposDinamicos->getList() as $campos){ ?>
                            <tr>
                                <td><?php echo $campos['label']; ?></td>
                                <td><?php echo ($campos['tipo'] == 1) ? 'Input' : (($campos['tipo'] == 2) ? 'Checkbox' : 'Select'); ?></td>
                                <td>
                                    <?php if (in_array('prod.edit', $_SESSION['usuario']['permisos']['code'])) { ?>
                                        <a href="campos_dinamicos_ae.php?edit=<?php echo $campos['id'] ?>"><button type="button" class="btn btn-warning btn-xs">Modificar</button></a> <!-- Acá hay que hacer que funcione el botón -->
                                    <?php } ?>
                                    <?php if (in_array('prod.del', $_SESSION['usuario']['permisos']['code'])) { ?>
                                        <a href="campos_dinamicos.php?del=<?php echo $campos['id'] ?>"><button type="button" class="btn btn-danger btn-xs">Borrar</button></a> <!-- Acá hay que hacer que funcione el botón -->
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
</html>
