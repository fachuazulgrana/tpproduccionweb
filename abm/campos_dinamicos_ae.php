<!DOCTYPE html>
<html lang="es">

<head>
	<?php

	$page = 'campos_dinamicos';
	require_once("includes/head_admin.php");

	if (isset($_GET['edit'])) {
		$campoDinamico = $CamposDinamicos->get($_GET['edit']);
	}
	?>
	<title>Campos Dinamicos Add / Edit</title>
</head>

<body>
	<?php
	require_once "includes/sidebar.php";
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

					<div class="col-sm-6">
						<input type="text" class="form-control" id="valores" name="valores" value="<?php echo (isset($campoDinamico->valores) ? $campoDinamico->valores : ''); ?>">
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