<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $page = "perfiles";
    require_once "head_admin.php";

    require_once('../app/Perfil.php');
    require_once('../pruebas/mysql-login.php');

    try {
        $con = new PDO('mysql:host=' . $hostname . ';dbname=' . $database . ';port=' . $puerto, $username, $password);
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage();
        die();
    }

    $Perfil = new Perfil($con);

    $query = 'SELECT * FROM permisos';
    $permisos = $con->query($query);

    if (isset($_GET['edit'])) {
        $perfiles = $Perfil->get($_GET['edit']);
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
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                </button>
            </p>
            <h1 class="page-header">Nuevo Perfil</h1>
            <div class="col-md-2">

            </div>
            <form action="perfiles.php" method="post" class="col-md-6 from-horizontal">
                <div class="form-group">
                    <label for="perfil-nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo (isset($perfiles->nombre) ? $perfiles->nombre : ''); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="perfil-tipo" class="col-sm-2 control-label">Permisos</label>
                    <div class="col-sm-10">
                        <select name="permisos[]" id="permisos" multiple="multiple" >
                            <?php foreach($permisos as $t){ ?>
                                <option value="<?php echo $t['permisos_id'] ?>"
                                <?php
                                if(isset($perfiles->permisos)){
                                    if(in_array($t['permisos_id'], $perfiles->permisos)){
                                        echo ' selected="selected" ';
                                    }
                                }
                                ?>><?php echo $t['nombre']?>
                                </option>
                            <?php } 
                            ?>
                            
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" name="formulario-perfiles">Guardar</button>
                    </div>
                </div>
                <input type="hidden" class="form-control" id="id_perfil" name="id_perfil" value="<?php echo (isset($perfiles->id_perfil)?$perfiles->id_perfil:'');?>">

            </form>
        </div>
    </div>
</body>
</html>
