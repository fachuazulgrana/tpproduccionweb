<!DOCTYPE html>
<html lang="es">

<head>
	<?php require_once "includes/head.php";
	$i = 0;
	if (isset($_COOKIE['cont'])) {
		$i = $_COOKIE['cont'] + 1;
		setcookie('cont', $i, time() + 84600);
	} else {
		$i = 0;
		setcookie('cont', $i, time() + 84600);
	} ?>

	<title>Detalles</title>
</head>

<body>
	<?php
	$page = 'catalogo';
	require_once "includes/encabezado.php";
	?>


	<div class="container text-center pt-5 pb-4">
		<?php
		foreach ($Productos->getProductos('', '', 1) as $ciudades) {
			if ($ciudades['id'] == $_GET['id']) break;
		}
		echo '<h1>' . $ciudades['nombre'] . '</h1>';
		if (isset($_SESSION)) {
			setcookie("recomendados[$i]", $ciudades['id'], time() + 84600);
		}
		$campo_dinamico = $CamposDinamicos->campoDinamicoexists($ciudades['id']);
		$comentario_dinamico = $ComentariosDinamicos->comentarioDinamicoexists($ciudades['id']);
		?>
	</div>

	<div class="pb-5 text-center">
		<svg width="20%" height="2">
			<rect width="100%" height="100" style="fill:rgb(255,165,0);stroke-width:0;stroke:rgb(0,0,0)" />
		</svg>
	</div>

	<section>
		<div class="container shadow justify-content-around p-4">
			<div class="row justify-content-center align-items-center">
				<div class="col-5">
					<div class="imagen1">
						<a href="abm/images/<?php echo $ciudades['id']; ?>/img_0_small.jpg" data-fancybox="gallery" data-caption="Caption for single image">
							<img height="100%" width="100%" src="abm/images/<?php echo $ciudades['id']; ?>/img_0_small.jpg" alt="imagen de <?php echo $ciudades['nombre']; ?>">
						</a>
					</div>
				</div>
				<div class="col-lg-7 incluye py-2">
					<h4 class="pl-3">
						<?php echo $ciudades['nombre']; ?> <br>
					</h4>
					<h5 class="pl-3">
						<?php echo $Continente->getNameContinente() . ' - ' . $Pais->getNamePais(); ?> <br>
						Precio: $<?php echo $ciudades['precio']; ?>
					</h5>
					<h5 class="pl-3 d-flex">
						<p class="mr-2">Puntaje: </p> <br>
						<p class="num-puntaje mr-2"> <?php echo $Comentarios->getRanqueo(''); ?> </p>
						<div class="star-rating" style="--rating: <?php echo $Comentarios->getRanqueo(''); ?>"></div>
					</h5>
					<?php echo '<p class="col-9 pt-4">' . $ciudades['descripcion'] . '</p>'; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="descripcion py-5">
		<div class="container py-5 shadow">
			<div class="row justify-content-center align-items-center" id="home">
				<div class="col-10">
					<h3 class="pb-3">
						<div class="col-lg-8 incluye py-2">
							Incluye:
						</div>
					</h3>
				</div>
				<div class="col-10">
					<ul class="descripcion_detalles">
						<li><?php echo $ciudades['detalle']; ?></li>
					</ul>
				</div>
				<div class="col-10 pt-3">
					<h4>Detalles</h4>
					<table class="table">
						<tbody>
							<?php
							echo '<tr><td>Pais: </td><td>' . $ciudades['nombre'] . '</td></tr>';
							echo '<tr><td>Viaje: </td><td>' . $Continente->getNameContinente() . ' - ' . $Pais->getNamePais() .  '</td></tr>';
							echo '<tr><td>Precio: </td><td> ' . '$' . $ciudades['precio'] . '</td></tr>';
							?>
						</tbody>
					</table>

				</div>
				<?php
				if ($campo_dinamico == 1) {
				?>
					<div class="col-10 pt-3">
						<h4>Más Caracteristicas</h4>
						<table class="table">
							<tbody>
								<?php
								foreach ($CamposDinamicos->getListByProd($ciudades['id']) as $campos) {
								?>
									<tr>
										<td><?php echo $campos['label']; ?>: </td>
										<td><?php echo $campos['valores']; ?></td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				<?php
				}
				?>
			</div>
			<div class="row justify-content-center">
				<div class="col-sm-11 col-md-10 col-lg-10 incluye py-2">
					<div class="container d-flex justify-content-around">
						<a href="#" class="btn btn-success">Comprar</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="py-5">
		<div class="container">

			<div class="text-center pb-3">
				<h2>Danos Tu Opinión Del Producto</h2>
			</div>

			<div class="pb-4 text-center">
				<svg width="20%" height="2">
					<rect width="100%" height="100" style="fill:#F78014;stroke-width:0;stroke:rgb(0,0,0)" />
				</svg>
			</div>

			<!-- ACÁ ESCRIBEN EL COMENTARIO -->

			<div class="container">
				<form action="#" method="post">
					<div class="row justify-content-center">
						<div class="col-8">
							<div class="row">
								<div class="col-sm-12 col-md-6">
									<label>Nombre *</label>
									<input type="text" name="nombre" required class="form-control">
								</div>
								<div class="col-sm-12 col-md-6">
									<label for="email">Email *</label>
									<input type="email" id="email" name="email" required class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-12 form-group">
									<label>Mensaje *</label>
									<textarea class="form-control comentario-textarea" name="comentario" required rows="3"></textarea>
								</div>
							</div>
							<?php
							if ($comentario_dinamico == 1) {
							?>
								<?php foreach ($ComentariosDinamicos->getComDin($ciudades['id']) as $comdin) {
								?>
									<div class="row">
										<div class="col-12 form-group">
											<label><?php echo $comdin['label'] ?><?php echo ($comdin['opcion'] == 1) ? ' *' : ''; ?></label>
											<?php
											if ($comdin['tipo'] == 1) { ?>
												<input type="input" <?php echo ($comdin['opcion'] == 1) ? 'required' : ''; ?> id="<?php echo $comdin['label'] ?>" name="adicional[][<?php echo $comdin['comentarios_dinamicos_id'] ?>]" class="form-control">
											<?php } ?>
											<?php if ($comdin['tipo'] == 2) { ?>
												<input type="checkbox" id="<?php echo $comdin['label'] ?>" name="adicional[][<?php echo $comdin['comentarios_dinamicos_id'] ?>]" class="form-control">
											<?php } ?>
											<?php if ($comdin['tipo'] == 3) {
												$select_valores = explode('/', $comdin['valor']);
											?>
												<select <?php echo ($comdin['opcion'] == 1) ? 'required' : ''; ?> name="adicional[][<?php echo $comdin['comentarios_dinamicos_id'] ?>]" id="<?php echo $comdin['label'] ?>" class="form-control">
													<?php foreach ($select_valores as $val) {
													?>

														<option value="<?php echo $val ?>" <?php if (isset($val)) {
																																	echo ' selected="selected" ';
																																} ?>><?php echo $val ?></option>
													<?php
													}
													?>
												</select>

											<?php } ?>
										</div>
									</div>
								<?php } ?>

							<?php
							}
							?>

							<div class="row">
								<div class="col-sm-6 col-md-10">
									<div class="form1">
										<p class="clasificacion" name="rankeo">
											<input id="radio1" type="radio" name="estrellas" value="5">
											<label for="radio1">★</label>
											<input id="radio2" type="radio" name="estrellas" value="4">
											<label for="radio2">★</label>
											<input id="radio3" type="radio" name="estrellas" value="3">
											<label for="radio3">★</label>
											<input id="radio4" type="radio" name="estrellas" value="2">
											<label for="radio4">★</label>
											<input id="radio5" type="radio" name="estrellas" value="1">
											<label for="radio5">★</label>
										</p>
									</div>
								</div>

								<input type="hidden" class="input-xlarge" name="productos_id" value="<?php echo $_GET['id'] ?>" />

								<div class="col-sm-6 col-md-2">
									<input class="text-white btn btn-md btn-block text-center newsletter-btn" type="submit" value="Enviar" name="comentar" data-toggle="modal" data-target="#myModal">
									<?php
									$Comentarios->setComentarios();
									?>

								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>

	<section class="py-5">
		<div class="container">

			<div class="text-center pb-3">
				<h2>Opiniones De Los Usuarios</h2>
			</div>

			<div class="pb-4 text-center">
				<svg width="20%" height="2">
					<rect width="100%" height="100" style="fill:#F78014;stroke-width:0;stroke:rgb(0,0,0)" />
				</svg>
			</div>
		</div>
	</section>

	<!-- ACÁ DEVULVEN LOS COMENTARIOS -->
	<div class="testimonial_area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<?php
					$cantidad = 0;
					foreach ($Comentarios->getComentarios($_GET) as $comentario) {
					?>
						<div class="row justify-content-center align-items-center">
							<div class="border p-4 shadow col-8 single_testmonial">
								<p> <?php echo $comentario['comentario']; ?> </p>

								<div class="testmonial_author">
									<h3>- <?php echo $comentario['email']; ?> </h3>
								</div>

								<h3 class="text-warning">
									<?php
									if ($comentario['calificacion'] == '1') {
										echo '★';
									} elseif ($comentario['calificacion'] == '2') {
										echo '★★';
									} elseif ($comentario['calificacion'] == '3') {
										echo '★★★';
									} elseif ($comentario['calificacion'] == '4') {
										echo '★★★★';
									} elseif ($comentario['calificacion'] == '5') {
										echo '★★★★★';
									}
									//echo $comentario['calificacion']; 
									?>
								</h3>
								<small>
									<i> <?php echo $comentario['fecha']; ?> </i>
								</small>
							</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>

	<?php
	require_once "includes/linkinteresesyherramientas.php";
	require_once "includes/footer.php";
	?>
</body>

</html>