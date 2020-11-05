<!DOCTYPE html>
<html lang="es">

<head>
    <?php

    $page = 'paises';
    require_once("head_admin.php");

    if($_SERVER['HTTP_REFERER'] != RUTA_BACKEND . "/paises.php")
    {
        header('Location:home.php');
    }

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
        <div class="main container-fluid">
            <h1 class="page-header"><?php echo (isset($pais->nombre) ? 'Editar Pais' : 'Agregar Pais'); ?></h1>
            
            <form action="paises.php" method="post" class="from-horizontal">
                <div class="form-group row">
                    <label for="paises-nombre" class="col-sm-3 control-label">Nombre</label>
                    <label for="paises-continente" class="col-sm-3 control-label">Continente</label>
                    <label for="paises-activo" class="col-sm-6 control-label">Activo</label>

                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo (isset($pais->nombre) ? $pais->nombre : ''); ?>">
                    </div>

                    <div class="col-sm-3">
                        <select style="width:400px;height:35px" name="continentes_id" id="continentes_id">

                                <option value="<?php echo (isset($pais->continentes_id) ? $pais->continentes_id : ''); ?>"><?php echo (isset($pais->continentes_id) ? $pais->continentes_id : 'continentes'); ?></option>
                            
                            <?php foreach ($Continente->getCont() as $continentes) : 
                                /*
                                 if(isset($pais->continentes_id)) { ?>
                                    <option value="<?php echo (isset($pais->continentes_id) ? $pais->continentes_id : ''); ?>"><?php echo (isset($pais->continentes_id) ? $pais->continentes_id : 'continentes'); ?></option>
                                <?php } */ ?>

                                    <option value="<?php echo $continentes['id'] ?>">
                                        <?php echo $continentes['nombre'] ?>
                                    </option>
                            <?php endforeach ?>
                        </select>
                        <!-- 
                        <input type="text" class="form-control" id="continentes_id" name="continentes_id" value="<?php echo (isset($pais->continentes_id) ? $pais->continentes_id : ''); ?>">
                        -->
                    </div> <!-- ACÁ TENGO QUE CAMBIAR -->

                    <div class="col-sm-3">
                        <select style="width:400px;height:35px" name="activo" id="activo">
                            <?php if(isset($pais->activo)){ ?>
                                <option value="<?php  echo ($pais->activo == 1) ? 1 : 0; ?>"><?php echo ($pais->activo == 1) ? 'si' : 'no'; ?></option>
                                <option value="<?php  echo ($pais->activo == 1) ? 0 : 1; ?>"><?php echo ($pais->activo == 1) ? 'no' : 'si'; ?></option>
                            <?php }else{ ?>
                                <option value="<?php  echo 1; ?>"><?php echo 'si'; ?></option>
                                <option value="<?php  echo 0; ?>"><?php echo 'no'; ?></option>
                            <?php } ?>
                        </select>

                        <!-- 
                            <input type="checkbox" class="form-control" id="activo" name="activo" value="<?php echo (isset($pais->activo) ? $pais->activo : ''); ?>">
                        -->
                    </div> <!-- ACÁ TENGO QUE PONER EL CHECKBOX -->

                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-success btn-xs" name="formulario-pais">Guardar</button>
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo (isset($pais->id) ? $pais->id : '');?>">

                </div>

            </form>
        </div>
    </div>
</body>
</html>
