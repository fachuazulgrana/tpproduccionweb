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
    $page = 'comentarios';
    require_once "sidebar.php";

    if (isset($_POST['formulario-comentarios_dinamicos'])) {
      if ($_POST['id'] > 0) {
        $ComentariosDinamicos->edit($_POST);
      } else {
        $ComentariosDinamicos->save($_POST);
      }
      header('Location: comentarios_dinamicos.php');
    }
    
    if (isset($_GET['del'])) {
      $resp = $ComentariosDinamicos->del($_GET['del']);
      if ($resp == 1) {
        header('Location: comentarios_dinamicos.php');
      }
      echo '<script>alert("' . $resp . '");</script>';
    }
    ?>

    <div class="content">
        <div class="main container-fluid">
            <h1 class="page-header">Comentarios Dinámicos</h1>
            <h2 class="sub-header">Listado <?php if (in_array('com.add', $_SESSION['usuario']['permisos']['code'])) { ?><a href="comentarios_dinamicos_ae.php"><button type="button" class="btn btn-success btn-xs">AGREGAR</button></a><?php } ?></h2> <!-- Acá hay que hacer que funcione el botón -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Nombre del Campo</th>
                            <th>Tipo de Campo</th>
                            <th>Requerido</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($ComentariosDinamicos->getDinamicos() as $comdin){ ?>
                            <tr>
                            <td><?php echo isset($comdin['productos']) ? implode(', ', $comdin['productos']) : 'No tiene producto asignado'; ?></td>
                                <td><?php echo $comdin['label']; ?></td>
                                <td><?php echo ($comdin['tipo'] == 1) ? 'Input' : (($comdin['tipo'] == 2) ? 'Checkbox' : 'Select'); ?></td>
                                
                                <td><?php echo ($comdin['opcion'] == 1) ? 'si' : 'no'; ?></td>
                                <td>
                                    <?php if (in_array('com.edit', $_SESSION['usuario']['permisos']['code'])) { ?>
                                        <a href="comentarios_dinamicos_ae.php?edit=<?php echo $comdin['id'] ?>"><button type="button" class="btn btn-warning btn-xs">Modificar</button></a> <!-- Acá hay que hacer que funcione el botón -->
                                    <?php } ?>
                                    <?php if (in_array('com.del', $_SESSION['usuario']['permisos']['code'])) { ?>
                                        <a href="comentarios_dinamicos.php?del=<?php echo $comdin['id'] ?>"><button type="button" class="btn btn-danger btn-xs">Borrar</button></a> <!-- Acá hay que hacer que funcione el botón -->
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
