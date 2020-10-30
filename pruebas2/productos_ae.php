<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $page = 'productos';
    require_once("head_admin.php");
    require_once('../app/Perfil.php');

    if($_SERVER['HTTP_REFERER'] != RUTA_BACKEND . "/productos.php")
    {
        header('Location:home.php');
    }

    if (isset($_GET['edit'])) {
        $produ = $Productos->getProd($_GET['edit']);
    }

    ?>

</head>
<?php
require_once "sidebar.php";
?>

<body>
<div class="content">
        <div class="col-sm-9 col-md-10 main">
            <p class="visible-xs">
                <!--
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                </button>
                -->
            </p>
            <h1 class="page-header">Agregar / Editar Producto</h1>
            <div class="col-md-2">

            </div>
            <form action="productos.php" method="post" class="col-md-6 from-horizontal">
                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo (isset($produ->nombre) ? $produ->nombre : ''); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo (isset($produ->descripcion) ? $produ->descripcion : ''); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="paises_id" class="col-sm-2 control-label">Pais</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="paises_id" name="paises_id" value="<?php echo (isset($produ->paises_id) ? $produ->paises_id : ''); ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="continentes_id" class="col-sm-2 control-label">Continente</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="continentes_id" name="continentes_id" value="<?php echo (isset($produ->continentes_id) ? $produ->continentes_id : ''); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="precio" class="col-sm-2 control-label">Precio</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="precio" name="precio" value="<?php echo (isset($produ->precio) ? $produ->precio : ''); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="activo" class="col-sm-2 control-label">Activo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="activo" name="activo" value="<?php echo (isset($produ->activo) ? $produ->activo : ''); ?>">
                    </div>
                </div>

<div class="form-group">
    <label for="x" class="col-sm-2 control-label">Agregar Campo</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="x" name="x" value="<?php echo (isset($produ->x) ? $produ->x : ''); ?>">
    </div>
</div>



                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success btn-xs" name="formulario-comentario">Guardar</button>
                    </div>
                </div>
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo (isset($produ->id)?$produ->id:'');?>">

            </form>
        </div>
    </div>
</body>
</html>
