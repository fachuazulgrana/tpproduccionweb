<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "head.php" ?>
    <title>BackEnd</title>
</head>

<body>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand">
    <img src="../images/logo_cabecera.png" alt="logo" style="width:40px;">
   </a>
   <a class="navbar-brand asd">Bienvenido al Panel BackEnd</a>
</nav>


<div class="sidebar">
  <a href="home.php">Home</a>
  <a href="productos.php">Productos</a>
  <a href="promociones.php">Promociones</a>
  <a href="noticias.php">Noticias</a>
  <a href="usuarios.php">Usuarios</a>
  <a href="perfiles.php">Perfiles</a>
  <a class="active">Logout</a>
  <a href="export.php">Export</a>
</div>

<div class="content">
  <h2>Responsive Sidebar Example</h2>
  <p>This example use media queries to transform the sidebar to a top navigation bar when the screen size is 700px or less.</p>
  <p>We have also added a media query for screens that are 400px or less, which will vertically stack and center the navigation links.</p>
 
</div>

</body>
</html>
