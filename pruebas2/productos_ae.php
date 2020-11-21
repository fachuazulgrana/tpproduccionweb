<!DOCTYPE html>
<html lang="es">

<head>
	<?php
	$page = 'productos';
	require_once("head_admin.php");
	require_once('../app/Perfil.php');

	if ($_SERVER['HTTP_REFERER'] != RUTA_BACKEND . "/productos.php" && !(isset($_GET['page']))) {
		header('Location:home.php');
	}

	if (isset($_GET['edit'])) {
		$produ = $Productos->get($_GET['edit']);
		$camp = $CamposDinamicos->getListByProd($produ->id);
	}

	if (isset($_GET['delcampo'])) {
		$resp = $CamposDinamicos->del($_GET['delcampo']);
		if ($resp == 1) {
			header('Location: ' . $_SERVER['HHTP_REFERER']);
		}
		echo '<script>alert("' . $resp . '");</script>';
	}
	?>

</head>
<style>
	form {
		margin: 20px 0;
	}

	form input,
	button {
		padding: 5px;
	}

	table {
		width: 100%;
		margin-bottom: 20px;
		border-collapse: collapse;
	}

	table,
	th,
	td {
		border: 1px solid #cdcdcd;
	}

	table th,
	table td {
		padding: 10px;
		text-align: left;
	}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
	$(document).ready(function() {
		$(".add-row").click(function() {
			var table = document.getElementById("tabla2");
			var nombre = $("#nombre").val();
			var texto = $("#texto").val();
			var markup = "<tr><td><input type='checkbox' name='record'></td><td><input style='width:400px;height:35px' type='text' id='info' name='label[]' value='' placeholder='Ingrese nombre del campo'></td><td><input style='width:400px;height:35px' type='text' id='info' name='text[]' value='' placeholder='Ingrese contenido del campo'></td></tr>";
			$("#tabla2").append(markup);
		});

		// Find and remove selected table rows
		$(".delete-row").click(function() {
			$("#tabla2").find('input[name="record"]').each(function() {
				if ($(this).is(":checked")) {
					$(this).parents("tr").remove();
				}
			});
		});
	});
</script>
<?php
require_once "sidebar.php";
?>

<body>
	<div class="content">
		<div class="main container">
			<div class="row justify-content-center align-items-center mb-3">
				<div class="col-6 pt-5">
					<h1 class="page-header display-4"><?php echo (isset($produ->nombre) ? 'Editar Producto' : 'Agregar Producto'); ?></h1>
				</div>
			</div>
			<div class="row justify-content-center align-items-center">
				<form action="productos.php" method="post" class="col-12 from-horizontal" enctype="multipart/form-data">
					<div class="form-group row">

						<div class="col-4">
							<label for="nombre" class="control-label">Nombre</label>
							<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo (isset($produ->nombre) ? $produ->nombre : ''); ?>">
						</div>

						<div class="col-4">
							<label for="paises_id" class="col-6 control-label">Pais</label>
							<select name="paises_id" id="paises_id" class="form-control">
								<?php foreach ($Pais->getPaises() as $pais) { ?>

									<option value="<?php echo $pais['id'] ?>" <?php echo (isset($produ->paises_id) ? (($produ->paises_id == $pais['id']) ? 'selected' : '') : ''); ?>>
										<?php echo $pais['nombre'] ?>
									</option>

								<?php } ?>
							</select>
						</div>

						<div class="col-4">
							<label label for="precio" class="control-label">Precio</label>
							<input type="text" class="form-control" id="precio" name="precio" value="<?php echo (isset($produ->precio) ? $produ->precio : ''); ?>">
						</div>

						<div class="col-4 mt-3">
							<label for="descripcion" class="control-label">Descripcion</label>
							<textarea style="resize: none" rows="6" type="text" class="form-control" id="descripcion" name="descripcion"><?php echo (isset($produ->descripcion) ? $produ->descripcion : ''); ?></textarea>
						</div>

						<div class="col-4 mt-3">
							<label for="detalle" class="control-label">Detalle</label>
							<textarea style="resize: none" rows="6" type="text" class="form-control" id="detalle" name="detalle"><?php echo (isset($produ->detalle) ? $produ->detalle : ''); ?></textarea>
						</div>

						<div class="col-4 mt-3">
							<label for="detalle" class="control-label">Comentarios Dinamicos</label>
							<select name="comentario[]" id="comentario" multiple='multiple' class="form-control">
								<?php foreach ($ComentariosDinamicos->getList() as $t) { ?>
									<option value="<?php echo $t['id'] ?>" <?php
																			if (isset($produ->comentarios)) {
																				if (in_array($t['id'], $produ->comentarios)) {
																					echo ' selected="selected" ';
																				}
																			}

																			?>><?php echo $t['label'] ?></option>
								<?php } ?>
							</select>
						</div>

						<div class="col-4 mt-3">
							<label for="activo" class="control-label">Activo</label>
							<select name="activo" id="activo" class="form-control">
								<?php if (isset($produ->activo)) { ?>
									<option value="<?php echo ($produ->activo == 1) ? 1 : 0; ?>"><?php echo ($produ->activo == 1) ? 'si' : 'no'; ?></option>
									<option value="<?php echo ($produ->activo == 1) ? 0 : 1; ?>"><?php echo ($produ->activo == 1) ? 'no' : 'si'; ?></option>
								<?php } else { ?>
									<option value="<?php echo 1; ?>"><?php echo 'si'; ?></option>
									<option value="<?php echo 0; ?>"><?php echo 'no'; ?></option>
								<?php } ?>
							</select>

							<label for="destacado" class="control-label mt-3">Destacado</label>
							<select name="destacado" id="destacado" class="form-control">
								<?php if (isset($produ->destacado)) { ?>
									<option value="<?php echo ($produ->destacado == 1) ? 1 : 0; ?>"><?php echo ($produ->destacado == 1) ? 'si' : 'no'; ?></option>
									<option value="<?php echo ($produ->destacado == 1) ? 0 : 1; ?>"><?php echo ($produ->destacado == 1) ? 'no' : 'si'; ?></option>
								<?php } else { ?>
									<option value="<?php echo 1; ?>"><?php echo 'si'; ?></option>
									<option value="<?php echo 0; ?>"><?php echo 'no'; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="input-group col-4 my-3 pl-0">
						<div class="custom-file">
							<input type="file" name="imagen" class="custom-file-input" id="inputGroupFile02">
							<label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
						</div>
					</div>



					<div class="main container-fluid">
						<h1 class="page-header">Campos Dinámicos</h1>


						<table class="table table-striped" id="tablaGeneral">
							<thead>
								<tr>
									<th>Nombre del Campo</th>
									<th>Valor del Campo</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($CamposDinamicos->getListByProd($produ->id) as $campos) { ?>
									<tr>
										<td><?php echo $campos['label']; ?></td>
										<td><?php echo $campos['valores']; ?></td>
										<td>
											<?php if (in_array('prod.edit', $_SESSION['usuario']['permisos']['code'])) { ?>
												<a href="campos_dinamicos_ae.php?edit=<?php echo $campos['id'] ?>"><button type="button" class="btn btn-warning btn-xs">Modificar</button></a>
											<?php } ?>
											<?php if (in_array('prod.del', $_SESSION['usuario']['permisos']['code'])) { ?>
												<a href="productos_ae.php?delcampo=<?php echo $campos['id'] ?>"><button type="button" class="btn btn-danger btn-xs">Borrar</button></a>
											<?php } ?>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>



						<!--             <form> -->
						<input type="button" class="add-row btn btn-success btn-xs" value="Add Row">
						<button type="button" class="delete-row btn btn-danger btn-xs">Delete Row</button>
						<!--             </form> -->
						<table id="tabla2">
							<thead>
								<tr>
									<th>Select</th>
									<th>Nombre del Campo</th>
									<th>Contenido de Campo</th>
								</tr>
							</thead>
							<tbody>
								<tr>
								</tr>
							</tbody>
						</table>

					</div>



					<div class="container mt-4">
						<div class="row">
							<div class="col-3 pl-0">
								<button type="submit" class="btn btn-success btn-xs" name="formulario-productos">Guardar</button>
							</div>
						</div>
					</div>

					<input type="hidden" class="form-control" id="id" name="id" value="<?php echo (isset($produ->id) ? $produ->id : ''); ?>">

				</form>
			</div>
		</div>
	</div>
</body>

</html>