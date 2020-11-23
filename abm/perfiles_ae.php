<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $page = "perfiles";
    require_once("includes/head_admin.php");
    require_once('../app/Perfil.php');

    if ($_SERVER['HTTP_REFERER'] != RUTA_BACKEND . "/perfiles.php") {
        header('Location:home.php');
    }


    $Perfil = new Perfil($con);

    $query = 'SELECT * FROM permisos';
    $permisos = $con->query($query);

    if (isset($_GET['edit'])) {
        $perfiles = $Perfil->get($_GET['edit']);
    }

    ?>

</head>
<?php
require_once "includes/sidebar.php";
?>

<body>
    <div class="content">
        <div class="main container-fluid">
            <h1 class="page-header"><?php echo (isset($perfiles->nombre) ? 'Editar Perfil' : 'Nuevo Perfil'); ?></h1>
            <form action="perfiles.php" method="post" class="col-12 from-horizontal">
                <div class="form-group row">
                    <label for="perfil-nombre" class="col-sm-4 control-label">Nombre</label>
                    <label for="perfil-tipo" class="col-sm-8 control-label">Permisos</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo (isset($perfiles->nombre) ? $perfiles->nombre : ''); ?>">
                    </div>
                    <div class="col-sm-4">
                        <select name="permisos[]" id="permisos" multiple="multiple">
                            <?php foreach ($permisos as $t) { ?>
                                <option value="<?php echo $t['permisos_id'] ?>" <?php
                                                                                if (isset($perfiles->permisos)) {
                                                                                    if (in_array($t['permisos_id'], $perfiles->permisos)) {
                                                                                        echo ' selected="selected" ';
                                                                                    }
                                                                                }
                                                                                ?>><?php echo $t['nombre'] ?>
                                </option>
                            <?php }
                            ?>

                        </select>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-success btn-xs" name="formulario-perfiles">Guardar</button>
                    </div>
                </div>
                <input type="hidden" class="form-control" id="id_perfil" name="id_perfil" value="<?php echo (isset($perfiles->id_perfil) ? $perfiles->id_perfil : ''); ?>">

            </form>
        </div>
    </div>
</body>

</html>