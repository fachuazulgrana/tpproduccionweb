<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $page = 'comentarios';
    require_once("head_admin.php");
    
    if($_SERVER['HTTP_REFERER'] != RUTA_BACKEND . "/comentarios.php")
    {
        header('Location:home.php');
    }


    if (isset($_GET['edit'])) {
        $coment = $Comentarios->get($_GET['edit']);
    }

    ?>
    <title>Comentarios AddEdit</title>

</head>

<body>
<?php
require_once "sidebar.php";
?>
<div class="content">
        <div class="col-sm-9 col-md-10 main">
        <!--
            <p class="visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                </button>
            </p>
        -->
            <h1 class="page-header">Agregar / Editar Comentario</h1>
            <div class="col-md-2">
            </div>
            <form action="comentarios.php" method="post" class="col-md-6 from-horizontal">
            <!--
                <div class="form-group">
                    <label for="comentarios-calificacion" class="col-sm-2 control-label">Calificacion</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="calificacion" name="calificacion" value="<?php echo (isset($coment->calificacion) ? $coment->calificacion : ''); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="comentarios-comentario" class="col-sm-2 control-label">Comentario</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="comentario" name="comentario" value="<?php echo (isset($coment->comentario) ? $coment->comentario : ''); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="comentarios-fecha" class="col-sm-2 control-label">Fecha</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo (isset($coment->fecha) ? $coment->fecha : ''); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="comentarios-productos_id" class="col-sm-2 control-label">Productos_id</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="productos_id" name="productos_id" value="<?php echo (isset($coment->productos_id) ? $coment->productos_id : ''); ?>">
                    </div>
                </div>
            -->
                <div class="form-group row">
                    <label for="comentarios-activo" class="col-sm-10 control-label">Activo</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="activo" name="activo" value="<?php echo (isset($coment->activo) ? $coment->activo : ''); ?>">
                    </div>

                    <div class="col-sm-offset-2 col-sm-6">
                        <button type="submit" class="btn btn-success btn-xs" name="formulario-comentario">Guardar</button>
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo (isset($coment->id) ? $coment->id : '');?>">

                </div>

            <!--
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                        <button type="submit" class="btn btn-default" name="formulario-comentario">Guardar</button>
                    </div>
                </div>
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo (isset($coment->id) ? $coment->id : '');?>">
            -->

            </form>
        </div>
    </div>
</body>
</html>
