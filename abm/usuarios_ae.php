<!DOCTYPE html>
<html lang="es">

<head>
	<?php
	$page = "usuarios";
	require_once("includes/head_admin.php");
	require_once('../app/Usuarios.php');
	require_once('../app/Perfil.php');

	if ($_SERVER['HTTP_REFERER'] != "/usuarios.php") {
		header('Location:home.php');
	}

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
require_once RUTA_BACKEND . "includes/sidebar.php";
?>

<body>
	<div class="content">
		<div class="main container-fluid">
			<h1 class="page-header"><?php echo (isset($usuarios->usuario) ? 'Editar Usuario' : 'Nuevo Usuario'); ?></h1>
			<form method="post" class="from-horizontal">
				<div class="form-group row">
					<label for="usuario-user" class="col-3 control-label">Usuario</label>
					<label for="usuario-nombre" class="col-3 control-label">Nombre</label>
					<label for="usuario-apellido" class="col-3 control-label">Apellido</label>
					<label for="usuario-email" class="col-3 control-label">Email</label>
					<div class="col-3">
						<input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo (isset($usuarios->usuario) ? $usuarios->usuario : ''); ?>" <?php echo (isset($usuarios->usuario) ? 'disabled' : ''); ?>>
					</div>
					<div class="col-3">
						<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo (isset($usuarios->nombre) ? $usuarios->nombre : ''); ?>">
					</div>
					<div class="col-3">
						<input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo (isset($usuarios->apellido) ? $usuarios->apellido : ''); ?>">
					</div>
					<div class="col-3">
						<input type="email" class="form-control" id="email" name="email" value="<?php echo (isset($usuarios->email) ? $usuarios->email : ''); ?>" <?php echo (isset($usuarios->usuario) ? 'disabled' : ''); ?>>
					</div>
				</div>
				<div class="form-group row">
					<label for="perfil" class="col-6 control-label">Perfil</label>
					<?php
					if (isset($usuarios->usuario)) {
					?>
						<label for="usuario-claveold" class="col-3 control-label">Contraseña Anterior</label>
					<?php
					}
					?>
					<div class="col-3"></div>
					<div class="col-6">
						<select name="perfil[]" id="perfil" multiple='multiple'>
							<?php foreach ($Perfil->getList() as $t) { ?>
								<option value="<?php echo $t['id_perfil'] ?>" <?php
																															if (isset($usuarios->perfiles)) {
																																if (in_array($t['id_perfil'], $usuarios->perfiles)) {
																																	echo ' selected="selected" ';
																																}
																															}

																															?>><?php echo $t['nombre'] ?></option>
							<?php } ?>
						</select>
					</div>

					<?php
					if (isset($usuarios->usuario)) {
					?>
						<div class="col-3">
							<input type="password" class="form-control" id="password_old" name="password_old">
						</div>
					<?php
					}
					?>

				</div>
				<div class="form-group row">
					<label for="usuario-clave1" class="col-3 control-label">Contraseña</label>
					<label for="usuario-clave2" class="col-3 control-label">Repetir Contraseña</label>
					<label for="usuario-activo" class="col-6 control-label">Activo</label>
					<div class="col-3">
						<input type="password" class="form-control" id="clave1" name="clave1">
					</div>
					<div class="col-3">
						<input type="password" class="form-control" id="clave2" name="clave2">
					</div>
					<div class="col-3">
						<input type="text" class="form-control" id="activo" name="activo" value="<?php echo (isset($usuarios->activo) ? $usuarios->activo : ''); ?>">
					</div>
					<div class="col-sm-offset-2 col-3">
						<button type="submit" class="btn btn-primary btn-xs" name="formulario-usuarios">Guardar</button>
					</div>
				</div>
				<input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo (isset($usuarios->id_usuario) ? $usuarios->id_usuario : ''); ?>">
			</form>
		</div>
	</div>
</body>

</html>