<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $page = "usuarios";
    require_once("head_admin.php");
    require_once('../app/Usuarios.php');
    require_once('../app/Perfil.php');

    $Usuario = new Usuario($con);
    $Perfil = new Perfil($con);

    $query = 'SELECT * FROM usuarios';
    $usuarios = $con->query($query);


    if (isset($_GET['edit'])) {
        $usuarios = $Usuario->get($_GET['edit']);
    }

    if (isset($_POST['formulario-usuarios'])) {
        if ($_POST['id_usuario'] > 0) {
            $resp = $Usuario->edit($_POST);
            if ($resp != 1) {
                echo '<script>alert("' . $resp . '");</script>';
            } else {
                echo '<script>alert("Usuario editado con exito");</script>';
                header('Location: usuarios.php');
            }
        } else {
            $resp =  $Usuario->save($_POST);
            if ($resp != 1) {
                echo '<script>alert("' . $resp . '");</script>';
            } else {
                echo '<script>alert("Usuario registrado con exito");</script>';
                header('Location: usuarios.php');
            }
        }
    }
    ?>
</head>
<?php
require_once "sidebar.php";
?>

<body>
    <div class="content">
        <div class="col-sm-9 col-md-10 main">
            <h1 class="page-header"><?php echo (isset($usuarios->usuario) ? 'Editar Usuario' : 'Nuevo Usuario'); ?></h1>
            <div class="col-md-2">
            </div>
            <form method="post" class="col-md-6 from-horizontal">
                <div class="form-group">
                    <label for="usuario-user" class="col-sm-2 control-label">Usuario</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo (isset($usuarios->usuario) ? $usuarios->usuario : ''); ?>" <?php echo (isset($usuarios->usuario) ? 'disabled' : ''); ?>>
                    </div>
                </div>
                <div class="form-group">
                    <label for="usuario-nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo (isset($usuarios->nombre) ? $usuarios->nombre : ''); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="usuario-apellido" class="col-sm-2 control-label">Apellido</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo (isset($usuarios->apellido) ? $usuarios->apellido : ''); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="usuario-email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo (isset($usuarios->email) ? $usuarios->email : ''); ?>" <?php echo (isset($usuarios->usuario) ? 'disabled' : ''); ?>>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tipo" class="col-sm-2 control-label">Perfil</label>
                    <div class="col-sm-10">
                        <select name="perfil[]" id="perfil" multiple='multiple'>
                            <?php foreach ($Perfil->getList() as $t) { ?>
                                <option value="<?php echo $t['id_perfil'] ?>" <?php
                                                                                if (isset($usuario->perfiles)) {
                                                                                    if (in_array($t['id_perfil'], $usuario->perfiles)) {
                                                                                        echo ' selected="selected" ';
                                                                                    }
                                                                                }

                                                                                ?>><?php echo $t['nombre'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <?php
                if (isset($usuarios->usuario)) {
                ?>
                    <div class="form-group">
                        <label for="usuario-tipo" class="col-sm-2 control-label">Contraseña Anterior</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password_old" name="password_old">
                        </div>
                    <?php
                }
                    ?>
                    <div class="form-group">
                        <label for="usuario-tipo" class="col-sm-2 control-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="clave1" name="clave1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="usuario-tipo" class="col-sm-2 control-label">Repetir Contraseña</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="clave2" name="clave2">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default" name="formulario-usuarios">Guardar</button>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo (isset($usuarios->id_usuario) ? $usuarios->id_usuario : ''); ?>">
            </form>
        </div>
    </div>
</body>

</html>