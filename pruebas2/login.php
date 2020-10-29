<!DOCTYPE html>
<html lang="es">

<?php
$page = "login";
require_once("head_admin.php");
/* require_once('../app/Usuarios.php'); */


?>
<title>Log In</title>

</head>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand">
        <img src="../images/logo_cabecera.png" alt="logo" style="width:40px;">
    </a>
    <a class="navbar-brand asd">Bienvenido al Panel BackEnd</a>
</nav>

<body>

    <div class="container-fluid">
        <br>
        <div class="col-sm-12 col-md-12">
            <div class="col-sm-6 col-md-6">
                <form action="home.php" method="post" class=" from-horizontal">
                    <div class="form-group">
                        <label for="usuario" class="col-sm-2 control-label">Usuario</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="" value="<?php echo isset($usuario->usuario) ? $usuario->usuario : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="calve" class="col-sm-2 control-label">Clave</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="clave" name="clave" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary btn-xs" name="login">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>