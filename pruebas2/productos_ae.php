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
    }

    ?>

</head>
<?php
require_once "sidebar.php";
?>

<body>
	<div class="content">
		<div class="main container">
			<div class="row justify-content-center align-items-center mb-3">
				<div class="col-6 pt-5">
					<h1 class="page-header display-4"><?php echo(isset($produ->nombre) ? 'Editar Producto' : 'Agregar Producto'); ?></h1>
				</div>
			</div>
			<div class="row justify-content-center align-items-center">
				<form action="productos.php" method="post" class="col-12 from-horizontal">
					<div class="form-group row">

						<div class="col-4">
							<label for="nombre" class="control-label">Nombre</label>
							<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo(isset($produ->nombre) ? $produ->nombre : ''); ?>">
						</div>

						<div class="col-4">
							<label for="paises_id" class="col-6 control-label">Pais</label>
							<select name="paises_id" id="paises_id" class="form-control">
								<?php foreach ($Pais->getPaises() as $pais) { ?>

									<option value="<?php echo $pais['id'] ?>" <?php echo(isset($produ->paises_id) ? (($produ->paises_id == $pais['id']) ? 'selected' : '') : ''); ?> >
											<?php echo $pais['nombre'] ?>
									</option>
						
								<?php } ?>
							</select>
						</div>

						<div class="col-4">
							<label label for="precio" class="control-label">Precio</label>
							<input type="text" class="form-control" id="precio" name="precio" value="<?php echo(isset($produ->precio) ? $produ->precio : ''); ?>">
						</div>

						<div class="col-4 mt-3">
							<label for="descripcion" class="control-label">Descripcion</label>
							<textarea style="resize: none" rows="6" type="text" class="form-control" id="descripcion" name="descripcion"><?php echo(isset($produ->descripcion) ? $produ->descripcion : ''); ?></textarea>
						</div>

						<div class="col-4 mt-3">
							<label for="detalle" class="control-label">Detalle</label>
							<textarea style="resize: none" rows="6" type="text" class="form-control" id="detalle" name="detalle"><?php echo(isset($produ->detalle) ? $produ->detalle : ''); ?></textarea>
						</div>
											
						<div class="col-4 mt-3">
							<label for="activo" class="control-label">Activo</label>
							<select name="activo" id="activo" class="form-control">
								<?php if (isset($produ->activo)) { ?>
									<option value="<?php  echo ($produ->activo == 1) ? 1 : 0; ?>"><?php echo ($produ->activo == 1) ? 'si' : 'no'; ?></option>
									<option value="<?php  echo ($produ->activo == 1) ? 0 : 1; ?>"><?php echo ($produ->activo == 1) ? 'no' : 'si'; ?></option>
								<?php } else { ?>
									<option value="<?php  echo 1; ?>"><?php echo 'si'; ?></option>
									<option value="<?php  echo 0; ?>"><?php echo 'no'; ?></option>
								<?php } ?>
							</select>

							<label for="destacado" class="control-label mt-3">Destacado</label>
							<select name="destacado" id="destacado" class="form-control">
								<?php if (isset($produ->destacado)) { ?>
									<option value="<?php  echo ($produ->destacado == 1) ? 1 : 0; ?>"><?php echo ($produ->destacado == 1) ? 'si' : 'no'; ?></option>
									<option value="<?php  echo ($produ->destacado == 1) ? 0 : 1; ?>"><?php echo ($produ->destacado == 1) ? 'no' : 'si'; ?></option>
								<?php } else { ?>
									<option value="<?php  echo 1; ?>"><?php echo 'si'; ?></option>
									<option value="<?php  echo 0; ?>"><?php echo 'no'; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>	

					<div class="container mt-4">
							<div class="row">
									<div class="col-3 pl-0">
											<button type="submit" class="btn btn-success btn-xs" name="formulario-productos">Guardar</button>
									</div>
							</div>
					</div>

					<input type="hidden" class="form-control" id="id" name="id" value="<?php echo(isset($produ->id)?$produ->id:'');?>">

				</form>
			</div>
		</div>
	</div>
</body>
</html>