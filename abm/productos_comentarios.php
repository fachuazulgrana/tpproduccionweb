<!DOCTYPE html>
<html lang="es">

<head>
	<?php require_once("includes/head_admin.php") ?>
	<title>Productos</title>
</head>

<body>

	<?php
	$page = 'productos';
	require_once "includes/sidebar.php";
	$id = $_GET['id'];
	$sql = "SELECT nombre FROM productos WHERE id = '$id'";
	$query = $con->query($sql)->fetch(PDO::FETCH_ASSOC);

	?>

	<div class="content">
		<h1 class="page-header">Comentarios de <?php echo $query['nombre'] ?></h1>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Rank</th>
						<th>Comentario</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($Comentarios->getComentProd($_GET) as $coment) {
					?>
						<tr>
							<td><?php echo $coment['fecha']; ?></td>
							<td><?php echo $coment['calificacion']; ?></td>
							<td><?php echo $coment['comentario']; ?></td>
						</tr>

					<?php
					}

					?>
				</tbody>
			</table>

</body>

</html>