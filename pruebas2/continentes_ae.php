<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $page = 'continentes';
    require_once("head_admin.php");
    //require_once('../app/Perfil.php');


    if (isset($_GET['edit'])) {
        $cont = $Continente->get($_GET['edit']);
    }

    ?>
    <title>Continentes AddEdit</title>

</head>

<body>
    <?php
    require_once "sidebar.php";
    ?>
    <div class="content">
        <div class="col-sm-9 col-md-10 main">
            <h1 class="page-header">Agregar / Editar Continentes</h1>
            <div class="col-md-2">
            </div>
            <form action="continentes.php" method="post" class="col-md-6 from-horizontal">
                <div class="form-group row">
                    <label for="continente-nombre" class="col-sm-4 control-label">Nombre</label>
                    <label for="continente-activo" class="col-sm-5 control-label">Activo</label>

                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo (isset($cont->nombre) ? $cont->nombre : ''); ?>">
                    </div>

                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="activo" name="activo" value="<?php echo (isset($cont->activo) ? $cont->activo : ''); ?>">
                    </div>

                    <div class="col-sm-offset-2 col-sm-4">
                        <button type="submit" class="btn btn-success btn-xs" name="formulario-continente">Guardar</button>
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo (isset($cont->id) ? $cont->id : '');?>">

                </div>

            </form>
        </div>
    </div>
</body>
</html>
