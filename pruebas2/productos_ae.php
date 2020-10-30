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
        <div class="main container-fluid">
            <h1 class="page-header">Agregar / Editar Producto</h1>
            <form action="productos.php" method="post" class="col-12 from-horizontal">
                <div class="form-group row">
                    <label for="nombre" class="col-3 control-label">Nombre</label>
                    <label for="descripcion" class="col-3 control-label">Descripcion</label>
                    <label for="paises_id" class="col-6 control-label">Pais</label>

                    <div class="col-3">
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo (isset($produ->nombre) ? $produ->nombre : ''); ?>">
                    </div>

                    <div class="col-3">
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo (isset($produ->descripcion) ? $produ->descripcion : ''); ?>">
                    </div>

                    <div class="col-3">
                        <input type="text" class="form-control" id="paises_id" name="paises_id" value="<?php echo (isset($produ->paises_id) ? $produ->paises_id : ''); ?>">
                    </div>
                    <div class="col-3"></div>
                    
                    <label for="continentes_id" class="col-3 control-label">Continente</label>
                    <label for="precio" class="col-3 control-label">Precio</label>
                    <label for="activo" class="col-6 control-label">Activo</label>

                    <div class="col-3">
                        <input type="text" class="form-control" id="continentes_id" name="continentes_id" value="<?php echo (isset($produ->continentes_id) ? $produ->continentes_id : ''); ?>">
                    </div>
                    
                    <div class="col-3">
                        <input type="text" class="form-control" id="precio" name="precio" value="<?php echo (isset($produ->precio) ? $produ->precio : ''); ?>">
                    </div>
                    
                    <div class="col-3">
                        <input type="text" class="form-control" id="activo" name="activo" value="<?php echo (isset($produ->activo) ? $produ->activo : ''); ?>">
                    </div>
                    
                    <div class="col-sm-offset-2 col-3">
                        <button type="submit" class="btn btn-success btn-xs" name="formulario-comentario">Guardar</button>
                    </div>
                </div>
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo (isset($produ->id)?$produ->id:'');?>">

            </form>
        </div>
    </div>
</body>
</html>
