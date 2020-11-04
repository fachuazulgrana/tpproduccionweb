<!DOCTYPE html>
<html lang="es">

<?php
$page = "login";
require_once("head_admin.php");
/* require_once('../app/Usuarios.php'); */


?>
<title>Login</title>

</head>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand">
        <img src="../images/logo_cabecera.png" alt="logo" style="width:40px;">
    </a>
    <a class="navbar-brand asd">Bienvenido al Panel BackEnd</a>
</nav>

<body>

<br>

<div class="box">
    <img src="../pruebas/img/avatar-user.png" class="avatar">
    <h1>Login</h1>
    <form action="home.php" method="post" class="from-horizontal">
        <div class="form-group">
            <!-- <label for="usuario" class="col-12 control-label">Usuario</label> -->

                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo isset($usuario->usuario) ? $usuario->usuario : ''; ?>">
            
            <!-- <label for="calve" class="col-12 control-label">Clave</label> -->

                <input type="password" class="form-control" id="clave" name="clave" placeholder="Clave">

                <button type="submit" class="btn btn-primary btn-xs" name="login">Entrar</button>
        </div>
    </form>
</div>