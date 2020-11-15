<!DOCTYPE html>
<html lang="es">

<head>
    <?php

    $page = 'comentarios';
    require_once("head_admin.php");

    if($_SERVER['HTTP_REFERER'] != RUTA_BACKEND . "/comentarios_dinamicos.php")
    {
        header('Location:home.php');
    }

    if (isset($_GET['edit'])) {
        $comdin = $ComentariosDinamicos->get($_GET['edit']);
    }

    ?>
    <title>Comentarios Dinamicos AddEdit</title>
</head>

<body>
    <?php
    require_once "sidebar.php";
    ?>
    <div class="content">
        <div class="main container-fluid">
            <h1 class="page-header"><?php echo (isset($comdin->label) ? 'Editar Campo' : 'Agregar Campo'); ?></h1>
            <form action="comentarios_dinamicos.php" method="post" class="col-12 from-horizontal">
                <div class="form-group row">
                    <label for="comentarios_dinamicos-label" class="col-sm-3 control-label">Texto</label>
                    <label for="comentarios_dinamicos-tipo" class="col-sm-3 control-label">Tipo</label>
                    <label for="comentarios_dinamicos-opcion" class="col-sm-6 control-label">Opción</label>

                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="label" name="label" value="<?php echo (isset($comdin->label) ? $comdin->label : ''); ?>">
                    </div>

                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo (isset($comdin->tipo) ? $comdin->tipo : ''); ?>">
                    </div>

                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="opcion" name="opcion" value="<?php echo (isset($comdin->opcion) ? $comdin->opcion : ''); ?>">
                    </div>

                    <div class="col-sm-offset-2 col-sm-3">
                        <button type="submit" class="btn btn-success btn-xs" name="formulario-comentarios_dinamicos">Guardar</button>
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo (isset($comdin->id) ? $comdin->id : '');?>">

                </div>

            </form>
        </div>
    </div>
</body>
</html>
