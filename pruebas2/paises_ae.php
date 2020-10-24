<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $page = 'paises';
    require_once("head_admin.php");
    //require_once('../app/Perfil.php');


    if (isset($_GET['edit'])) {
        $pais = $Pais->get($_GET['edit']);
    }

    ?>
    <title>Paises AddEdit</title>

</head>

<body>
    <?php
    require_once "sidebar.php";
    ?>
    <div class="content">
        <div class="col-sm-9 col-md-10 main">
            <h1 class="page-header">Agregar / Editar Paises</h1>
            <div class="col-md-2">
            </div>
            <form action="paises.php" method="post" class="col-md-6 from-horizontal">
                <div class="form-group row">
                    <label for="paises-nombre" class="col-sm-3 control-label">Nombre</label>
                    <label for="paises-continente" class="col-sm-6 control-label">Continente</label>
                    <label for="paises-activo" class="col-sm-3 control-label">Activo</label>

                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo (isset($pais->nombre) ? $pais->nombre : ''); ?>">
                    </div>

                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="continentes_id" name="continentes_id" value="<?php echo (isset($pais->continentes_id) ? $pais->continentes_id : ''); ?>">
                    </div>

                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="activo" name="activo" value="<?php echo (isset($pais->activo) ? $pais->activo : ''); ?>">
                    </div>

                    <div class="col-sm-offset-2 col-sm-3">
                        <button type="submit" class="btn btn-primary btn-xs" name="formulario-pais">Guardar</button>
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo (isset($pais->id) ? $pais->id : '');?>">

                </div>

            </form>
        </div>
    </div>
</body>
</html>
