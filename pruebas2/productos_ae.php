<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $page = 'productos';
    require_once("head_admin.php");

    if ($_SERVER['HTTP_REFERER'] != RUTA_BACKEND . "/productos.php" && !(isset($_GET['page']))) {
        header('Location:home.php');
    }

    $query = 'SELECT * FROM continentes';
    $continentes = $con->query($query);

    if (isset($_GET['edit'])) {
        $produ = $Productos->get($_GET['edit']);
    }

    ?>

</head>
<?php
require_once "sidebar.php";
?>

<body>
<div class="content">
        <div class="main container">
            <div class="row justify-content-center align-items-center mb-3">
                <div class="col-6">
                    <h1 class="page-header">Agregar / Editar Producto</h1>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <form action="productos.php" method="post" class="col-10 from-horizontal">
                    <div class="form-group row justify-content-center">
                        <div class="col-4">
                            <label for="nombre" class="control-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo(isset($produ->nombre) ? $produ->nombre : ''); ?>">
                        </div>

                        <div class="col-4">
                            <label for="descripcion" class="control-label">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo(isset($produ->descripcion) ? $produ->descripcion : ''); ?>">
                        </div>

                        <div class="col-4">
                            <label for="paises_id" class="control-label">Pais</label>
                            <select name="continentes[]" id="continentes" class="form-control">
                                <?php
                                foreach ($Pais->getPais($produ->paises_id) as $pais) { ?>

                                <option value="<?php echo $pais['id'] ?>" class="<?php (isset($produ->paises_id) ? 'selected' : ''); ?>">
                                    <?php echo $pais['nombre'] ?>
                                </option>
                            
                                <?php } ?>
                            </select>
                            <input type="text" class="form-control" id="paises_id" name="paises_id" value="<?php echo(isset($produ->paises_id) ? $produ->paises_id : ''); ?>">
                        </div>
                        
                        <div class="col-4 mt-3">
                            <label for="continentes_id" class="control-label">Continente</label>
                            <select name="continentes[]" id="continentes" class="form-control">
                                <?php foreach ($Continente->getContinente(1) as $continente) { ?>
                            
                                <option value="<?php echo $continente['id'] ?>">
                                    <?php echo $continente['nombre'] ?>
                                </option>
                            
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="col-4 mt-3">
                            <label label for="precio" class="control-label">Precio</label>
                            <input type="text" class="form-control" id="precio" name="precio" value="<?php echo(isset($produ->precio) ? $produ->precio : ''); ?>">
                        </div>
                        
                        <div class="col-4 mt-3">
                            <label for="activo" class="control-label">Activo</label>
                            <input type="text" class="form-control" id="activo" name="activo" value="<?php echo(isset($produ->activo) ? $produ->activo : ''); ?>">
                        </div>
                        
                    </div>
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-3 pl-0">
                                <button type="submit" class="btn btn-success btn-xs" name="formulario-productos">Guardar</button>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo(isset($produ->id)?$produ->id:'');?>">

                </form>

            </div>
        </div>
    </div>
</body>
</html>
