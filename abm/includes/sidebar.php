<style>
	.dropdown-btn {
		padding: 16px;
		text-decoration: none;
		display: block;
		border: none;
		background: none;
		width: 100%;
		text-align: left;
		cursor: pointer;
		outline: none;
	}

	.dropdown-container {
		display: none;
		padding-left: 8px;
	}

	.fa-caret-down {
		float: right;
		padding-right: 8px;
	}
</style>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<!-- Brand/logo -->
	<a class="navbar-brand">
		<img src="../images/logo_cabecera.png" alt="logo" style="width:40px;">
	</a>
	<?php if (isset($_SESSION['usuario'])) { ?>
		<a class="navbar-brand asd">Bienvenido al Panel de Backend <?php echo $_SESSION['usuario']['nombre'] ?> </a>
	<?php } ?>
</nav>

<ul class="sidebar">
	<li <?php echo ($page == 'home') ? "class=active" : ""; ?>>
		<a href=<?php echo RUTA_BACKEND_HOME ?>><i class="fa fa-fw fa-home"></i>Home</a>
	</li>


	<?php if (in_array('user', $_SESSION['usuario']['permisos']['seccion'])) { ?>
		<li <?php echo ($page == 'perfiles') ? "class=active" : ""; ?>>
			<a href=<?php echo RUTA_BACKEND_PERFILES ?>><i class="fa fa-fw fa-lock"></i>Perfiles</a>
		</li>
	<?php } ?>

	<?php if (in_array('user', $_SESSION['usuario']['permisos']['seccion'])) { ?>
		<li <?php echo ($page == 'usuarios') ? "class=active" : ""; ?>>
			<a href=<?php echo RUTA_BACKEND_USUARIOS ?>><i class="fa fa-fw fa-user"></i>Usuarios</a>
		</li>
	<?php } ?>

	<?php if (in_array('prod', $_SESSION['usuario']['permisos']['seccion'])) { ?>
		<li <?php echo ($page == 'productos') ? "class=active" : ""; ?>>
			<a href=<?php echo RUTA_BACKEND_PRODUCTOS ?>><i class="fa fa-fw fa-shopping-cart"></i>Productos</a>
		</li>
	<?php } ?>

	<?php if (in_array('pais', $_SESSION['usuario']['permisos']['seccion'])) { ?>
		<li <?php echo ($page == 'paises') ? "class=active" : ""; ?>>
			<a href=<?php echo RUTA_BACKEND_PAISES ?>><i class="fa fa-fw fa-plane"></i>Paises</a>
		</li>
	<?php } ?>

	<?php if (in_array('cont', $_SESSION['usuario']['permisos']['seccion'])) { ?>
		<li <?php echo ($page == 'continentes') ? "class=active" : ""; ?>>
			<a href=<?php echo RUTA_BACKEND_CONTINENTES ?>><i class="fa fa-fw fa-globe"></i>Continentes</a>
		</li>
	<?php } ?>

	<?php if (in_array('com', $_SESSION['usuario']['permisos']['seccion'])) { ?>
		<li>
			<button class="dropdown-btn <?php echo ($page == 'comentarios' || $page == 'comentarios-dinamicos') ? "bg-primary" : ""; ?>"><i class="fa fa-fw fa-comments-o"></i>Comentarios<i class="fa fa-caret-down"></i></button>
			<div class="dropdown-container">
				<a <?php echo ($page == 'comentarios') ? "class='bg-primary'" : ""; ?> href=<?php echo RUTA_BACKEND_COM ?>><i class="fa fa-fw fa-list"></i>Listado</a>
				<a <?php echo ($page == 'comentarios-dinamicos') ? "class='bg-primary'" : ""; ?> href=<?php echo RUTA_BACKEND_COM_DIN ?>><i class="fa fa-fw fa-plus"></i>Comentarios Dinámicos</a>
			</div>
		</li>
	<?php } ?>

	<?php if (in_array('cli', $_SESSION['usuario']['permisos']['seccion'])) { ?>
		<li <?php echo ($page == 'clientes') ? "class=active" : ""; ?>>
			<a href=<?php echo RUTA_BACKEND_CLIENTES ?>><i class="fa fa-fw fa-user"></i>Clientes</a>
		</li>
	<?php } ?>

	<?php if (in_array('prod', $_SESSION['usuario']['permisos']['seccion'])) { ?>
		<li <?php echo ($page == 'campos_dinamicos') ? "class=active" : ""; ?>>
			<a href=<?php echo RUTA_BACKEND_CAM_DIN ?>><i class="fa fa-fw fa-user"></i>Campos Dinamicos</a>
		</li>
	<?php } ?>

	<li><a href=<?php echo RUTA_BACKEND_LOGOUT ?>><i class="fa fa-fw fa-power-off"></i>Logout</a></li>
</ul>

<script>
	var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;

	for (i = 0; i < dropdown.length; i++) {
		dropdown[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display === "block") {
				dropdownContent.style.display = "none";
			} else {
				dropdownContent.style.display = "block";
			}
		});
	}
</script>