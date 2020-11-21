<!DOCTYPE html>
<html lang="es">

<head>
    <?php

    $page = 'campos_dinamicos';
    require_once("head_admin.php");

    if ($_SERVER['HTTP_REFERER'] != RUTA_BACKEND . "/campos_dinamicos.php") {
        header('Location:home.php');
    }

    if (isset($_GET['edit'])) {
        $campoDinamico = $CamposDinamicos->get($_GET['edit']);
    }

    ?>
    <title>Campos Dinamicos AddEdit</title>
</head>

<body>
    <?php
    require_once "sidebar.php";
    ?>
    <div class="content">
        <div class="main container-fluid">
            <h1 class="page-header"><?php echo (isset($campoDinamico->label) ? 'Editar Campo' : 'Agregar Campo'); ?></h1>
            <form action="campos_dinamicos.php" method="post" class="col-12 from-horizontal">
                <div class="form-group row">
                    <label for="campos_dinamicos-label" class="col-sm-6 control-label">Texto</label>
                    <label for="campos_dinamicos-tipo" class="col-sm-6 control-label">Tipo</label>



                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="label" name="label" value="<?php echo (isset($campoDinamico->label) ? $campoDinamico->label : ''); ?>">
                    </div>

<!--                     <script>
                        function enableDisableCodigo() {

                            var codigo = document.getElementByName("valores");
                            var tipo = document.getElementByName("tipo").value;

                            if (tipo == 'Select') {
                                codigo.disabled = true;
                            } else {
                                codigo.disabled = false;
                            }
                        }
                    </script> -->

                    <div class="col-sm-6">
                        <select style="width:400px;height:35px" name="tipo" id="tipo">
                            <?php if (isset($campoDinamico->tipo)) { ?>
                                <option value="<?php echo 1; ?>" <?php echo ($campoDinamico->tipo == 1) ? 'selected' : ''; ?>> <?php echo 'Input'; ?> </option>
                                <option value="<?php echo 2; ?>" <?php echo ($campoDinamico->tipo == 2) ? 'selected' : ''; ?>> <?php echo 'Checkbox'; ?> </option>
                                <option value="<?php echo 3; ?>" <?php echo ($campoDinamico->tipo == 3) ? 'selected' : ''; ?>> <?php echo 'Select' ?> </option>
                            <?php } else { ?>
                                <option value="<?php echo 1; ?>"><?php echo 'Input'; ?></option>
                                <option value="<?php echo 2; ?>"><?php echo 'Checkbox'; ?></option>
                                <option value="<?php echo 3; ?>"><?php echo 'Select'; ?></option>
                            <?php } ?>
                        </select>


                    </div>

                    <div class="col-sm-offset-2 col-sm-3">
                        <button type="submit" class="btn btn-success btn-xs" name="formulario-campos_dinamicos">Guardar</button>
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo (isset($campoDinamico->id) ? $campoDinamico->id : ''); ?>">

                </div>

            </form>
        </div>
    </div>
</body>

</html>