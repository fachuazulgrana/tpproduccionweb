<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand">
    <img src="../images/logo_cabecera.png" alt="logo" style="width:40px;">
   </a>
   <a class="navbar-brand asd">Bienvenido al Panel BackEnd</a>
</nav>



<ul class="sidebar">
    <li <?php echo ($page == 'home') ? "class=active" : ""; ?>>
        <a href="home.php">Home</a>
    </li>
    
    <li <?php echo ($page == 'productos') ? "class=active" : ""; ?>>
        <a href="productos.php">Productos</a>
    </li>
    
    <li <?php echo ($page == 'promociones') ? "class=active" : ""; ?>>
        <a href="promociones.php">Promociones</a>
    </li>
    
    <li <?php echo ($page == 'noticias') ? "class=active" : ""; ?>>
        <a href="noticias.php">Noticias</a>
    </li>
    
    <li <?php echo ($page == 'usuarios') ? "class=active" : ""; ?>>
        <a href="usuarios.php">Usuarios</a>
    </li>
    
    <li <?php echo ($page == 'perfiles') ? "class=active" : ""; ?>>
        <a href="perfiles.php">Perfiles</a>
    </li>
    
    <li <?php echo ($page == 'logout') ? "class=active" : ""; ?>>
        <a href="logout.php">Logout</a>
    </li>
    
    <li <?php echo ($page == 'export') ? "class=active" : ""; ?>>
        <a href="export.php">Export</a>
    </li>
</ul>

<!--
<div class="sidebar">
  <a href="home.php">Home</a>
  <a href="productos.php">Productos</a>
  <a href="promociones.php">Promociones</a>
  <a href="noticias.php">Noticias</a>
  <a href="usuarios.php">Usuarios</a>
  <a href="perfiles.php">Perfiles</a>
  <a href="logout.php">Logout</a>
  <a href="export.php">Export</a>
</div>


<ul class="navbar-nav nav-pills align-items-center">
    <li class="nav-brand px-4 py-2">
        <a href="<?php echo RUTA_HOME ?>" class="logomenu"> <img src="images/logo_cabecera.png" width="70" height="60" alt="Logo"></a>
    </li>

    <li <?php echo ($page == 'index') ? "class='nav-item active px-3 py-2'" : ""; ?> class="nav-item px-3 py-2">
        <a class="nav-link borde" href=<?php echo RUTA_HOME ?>>Inicio</a>
    </li>

    <li <?php echo ($page == 'catalogo') ? "class='nav-item active px-3 py-2'" : ""; ?> class="nav-item px-3 py-2">
        <a class="nav-link borde" href=<?php echo RUTA_CATALOGO . '?continente=&pais=&ciudad=' ?>>Catálogo</a>
    </li>

    <li <?php echo ($page == 'paquetes') ? "class='nav-item active px-3 py-2'" : ""; ?> class="nav-item px-3 py-2">
        <a class="nav-link borde" href=<?php echo RUTA_PAQUETES ?>>Paquetes</a>
    </li>

    <li <?php echo ($page == 'contacto') ? "class='nav-item active px-3 py-2'" : ""; ?> class="nav-item px-3 py-2">
        <a class="nav-link borde" href=<?php echo RUTA_CONTACTO ?>>Contacto</a>
    </li>
</ul>

-->