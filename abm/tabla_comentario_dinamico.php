<!DOCTYPE html>
<html lang="es">

<head>
	<?php require_once "includes/head_admin.php" ?>
	<title>Comentarios Dinamicos</title>
	<?php if (!in_array('com', $_SESSION['usuario']['permisos']['seccion'])) {
		header('Location: home.php');
	} ?>
</head>

<body>

	<?php
	$page = 'tabla_comentario_dinamico';
	require_once("includes/sidebar.php");

	$dinamicos = $ComentariosDinamicos->getByProd($_GET['dinamico_id']);
	?>

	<div class="content">
		<h1 class="page-header">Comentarios Dinamicos</h1>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Ciudad</th>
						<th>Tipo de Campo</th>
						<th>Contendio</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($dinamicos as $din) {
					?>
						<tr>
							<td><?php echo $din['nombre']; ?></td>
							<td><?php echo $din['label']; ?></td>
							<td><?php echo $din['informacion'] ?></td>

						</tr>

					<?php
					}

					?>
				</tbody>
			</table>
			<a href="comentarios.php?page=&orden=&limit="><button type="button" class="btn btn-success btn-xs"><?php echo 'Volver a Comentarios'; ?></button></a>

</body>

</html>