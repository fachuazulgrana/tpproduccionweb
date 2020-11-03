<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $page = 'continentes';
    require_once("head_admin.php");
    
    if($_SERVER['HTTP_REFERER'] != RUTA_BACKEND . "/continentes.php")
    {
        header('Location:home.php');
    }


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
        <div class="main container-fluid">
            <h1 class="page-header"><?php echo (isset($cont->nombre) ? 'Editar Continente' : 'Agregar Continente'); ?></h1>
            <form action="continentes.php" method="post" class="col-12 from-horizontal">
                <div class="form-group row">
                    <label for="continente-nombre" class="col-sm-4 control-label">Nombre</label>
                    <label for="continente-activo" class="col-sm-5 control-label">Activo</label>

                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo (isset($cont->nombre) ? $cont->nombre : ''); ?>">
                    </div>

                    <div class="col-sm-4">
                        <select name="activo" id="activo">
                            <?php if(isset($cont->activo)){ ?>
                                <option value="<?php  echo ($cont->activo == 1) ? 1 : 0; ?>"><?php echo ($cont->activo == 1) ? 'si' : 'no'; ?></option>
                                <option value="<?php  echo ($cont->activo == 1) ? 0 : 1; ?>"><?php echo ($cont->activo == 1) ? 'no' : 'si'; ?></option>
                            <?php }else{ ?>
                                <option value="<?php  echo 1; ?>"><?php echo 'si'; ?></option>
                                <option value="<?php  echo 0; ?>"><?php echo 'no'; ?></option>
                            <?php } ?>
                        </select>
                        <!--
                            <input type="text" class="form-control" id="activo" name="activo" value="<?php echo (isset($cont->activo) ? $cont->activo : ''); ?>">
                        -->
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
