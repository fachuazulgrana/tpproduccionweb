<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $page = "perfiles";
    require_once("head_admin.php");
    require_once('../app/Perfil.php');


    $Perfil = new Perfil($con);

    $query = 'SELECT * FROM permisos';
    $permisos = $con->query($query);

    if (isset($_GET['edit'])) {
        $perfiles = $Perfil->get($_GET['edit']);
    }

    ?>

</head>
<?php
require_once "sidebar.php";
?>

<body>
<div class="content">
        <div class="col-sm-9 col-md-10 main">
            <h1 class="page-header"><?php echo (isset($perfiles->nombre) ? 'Editar Perfil' : 'Nuevo Perfil'); ?></h1>
            <div class="col-md-2">

            </div>
            <form action="perfiles.php" method="post" class="col-md-6 from-horizontal">
                <div class="form-group">
                    <label for="perfil-nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo (isset($perfiles->nombre) ? $perfiles->nombre : ''); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="perfil-tipo" class="col-sm-2 control-label">Permisos</label>
                    <div class="col-sm-10">
                        <select name="permisos[]" id="permisos" multiple="multiple" >
                            <?php foreach($permisos as $t){ ?>
                                <option value="<?php echo $t['permisos_id'] ?>"
                                <?php
                                if(isset($perfiles->permisos)){
                                    if(in_array($t['permisos_id'], $perfiles->permisos)){
                                        echo ' selected="selected" ';
                                    }
                                }
                                ?>><?php echo $t['nombre']?>
                                </option>
                            <?php } 
                            ?>
                            
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success btn-xs" name="formulario-perfiles">Guardar</button>
                    </div>
                </div>
                <input type="hidden" class="form-control" id="id_perfil" name="id_perfil" value="<?php echo (isset($perfiles->id_perfil)?$perfiles->id_perfil:'');?>">

            </form>
        </div>
    </div>
</body>
</html>
