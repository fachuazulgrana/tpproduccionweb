<!DOCTYPE html>
<html lang="es">

<head>
	<?php require_once "includes/head_admin.php" ?>
	<title>Campos Dinamicos</title>
	<?php if (!in_array('prod', $_SESSION['usuario']['permisos']['seccion'])) {
		header('Location: home.php');
	} ?>
</head>

<body>
	<?php
	$page = 'campos_dinamicos';
	require_once "includes/sidebar.php";

	if (isset($_POST['formulario-campos_dinamicos'])) {
		if ($_POST['id'] > 0) {
			$CamposDinamicos->edit($_POST);
		} else {
			$CamposDinamicos->save($_POST);
		}
		header('Location: campos_dinamicos.php');
	}

	if (isset($_GET['del'])) {
		$resp = $CamposDinamicos->del($_GET['del']);
		if ($resp == 1) {
			header('Location: campos_dinamicos.php');
		}
		echo '<script>alert("' . $resp . '");</script>';
	}
	?>

	<div class="content">
		<div class="main container-fluid">
			<h1 class="page-header">Campos Dinámicos</h1>
			<h2 class="sub-header">Listado <?php if (in_array('prod.add', $_SESSION['usuario']['permisos']['code'])) { ?><a href="campos_dinamicos_ae.php"><button type="button" class="btn btn-success btn-xs">AGREGAR</button></a><?php } ?></h2>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nombre del Campo</th>
							<th>Valor del Campo</th>
							<!-- <th>Acciones</th> -->
						</tr>
					</thead>
					<tbody>
						<?php foreach ($CamposDinamicos->getList() as $campos) { ?>
							<tr>
								<td><?php echo $campos['label']; ?></td>
								<td><?php echo $campos['valores']; ?></td>
<!-- 								<td>
									<?php if (in_array('prod.edit', $_SESSION['usuario']['permisos']['code'])) { ?>
										<a href="campos_dinamicos_ae.php?edit=<?php echo $campos['id'] ?>"><button type="button" class="btn btn-warning btn-xs">Modificar</button></a>
									<?php } ?>
									<?php if (in_array('prod.del', $_SESSION['usuario']['permisos']['code'])) { ?>
										<a href="campos_dinamicos.php?del=<?php echo $campos['id'] ?>"><button type="button" class="btn btn-danger btn-xs">Borrar</button></a>
									<?php } ?>
								</td> -->
							</tr>
						<?php } ?>
					</tbody>
					
				</table>
				<h6>Para agregar, modificar o eliminar campos dinamicos dirijase al producto</h6>
			</div>

		</div>
	</div>
</body>

</html>