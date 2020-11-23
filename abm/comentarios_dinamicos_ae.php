<!DOCTYPE html>
<html lang="es">

<head>
    <?php

    $page = 'comentarios-dinamicos';
    require_once("includes/head_admin.php");

    if ($_SERVER['HTTP_REFERER'] != RUTA_BACKEND . "/comentarios_dinamicos.php") {
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
    require_once "includes/sidebar.php";
    ?>
    <div class="content">
        <div class="main container-fluid">
            <h1 class="page-header"><?php echo (isset($comdin->label) ? 'Editar Campo' : 'Agregar Campo'); ?></h1>
            <form action="comentarios_dinamicos.php" method="post" class="col-12 from-horizontal">
                <div class="form-group row">
                    <label for="comentarios_dinamicos-label" class="col-sm-3 control-label">Texto</label>
                    <label for="comentarios_dinamicos-tipo" class="col-sm-3 control-label">Tipo</label>
                    <label for="comentarios_dinamicos-tipo" class="col-sm-3 control-label">Valores (Solo Select)</label>
                    <label for="comentarios_dinamicos-opcion" class="col-sm-3 control-label">Opción</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="label" name="label" value="<?php echo (isset($comdin->label) ? $comdin->label : ''); ?>">
                    </div>

                    <div class="col-sm-3">
                        <select style="width:300px;height:35px" name="tipo" id="tipo">
                            <?php if (isset($comdin->tipo)) { ?>
                                <option value="<?php echo 1; ?>" <?php echo ($comdin->tipo == 1) ? 'selected' : ''; ?>> <?php echo 'Input'; ?> </option>
                                <option value="<?php echo 2; ?>" <?php echo ($comdin->tipo == 2) ? 'selected' : ''; ?>> <?php echo 'Checkbox'; ?> </option>
                                <option value="<?php echo 3; ?>" <?php echo ($comdin->tipo == 3) ? 'selected' : ''; ?>> <?php echo 'Select' ?> </option>
                            <?php } else { ?>
                                <option value="<?php echo 1; ?>"><?php echo 'Input'; ?></option>
                                <option value="<?php echo 2; ?>"><?php echo 'Checkbox'; ?></option>
                                <option value="<?php echo 3; ?>"><?php echo 'Select'; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="valor" name="valor" value="<?php echo (isset($comdin->valor) ? $comdin->valor : ''); ?>">
                    </div>
                    <div class="col-sm-3">
                        <select style="width:300px;height:35px" name="opcion" id="opcion">
                            <?php if (isset($comdin->opcion)) { ?>
                                <option value="<?php echo ($comdin->opcion == 1) ? 1 : 0; ?>"><?php echo ($comdin->opcion == 1) ? 'si' : 'no'; ?></option>
                                <option value="<?php echo ($comdin->opcion == 1) ? 0 : 1; ?>"><?php echo ($comdin->opcion == 1) ? 'no' : 'si'; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo 1; ?>"><?php echo 'si'; ?></option>
                                <option value="<?php echo 0; ?>"><?php echo 'no'; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-offset-2 col-sm-3">
                        <button type="submit" class="btn btn-success btn-xs" name="formulario-comentarios_dinamicos">Guardar</button>
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo (isset($comdin->id) ? $comdin->id : ''); ?>">

                </div>

            </form>
        </div>
    </div>
</body>

</html>