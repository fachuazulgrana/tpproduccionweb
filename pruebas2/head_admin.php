<?php
session_start();
require_once('../pruebas/mysql-login.php'); ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Styles -->
<link rel="stylesheet" href="backend-style.css">
<link rel="stylesheet" href="<?php echo RUTA_CSS ?>bootstrap.min.css">
<link rel="stylesheet" href="<?php echo RUTA_CSS ?>jquery.fancybox.min.css" />
<script src="<?php echo RUTA_JS ?>jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');

require_once('../pruebas/continente.php');
require_once('../pruebas/pais.php');
require_once('../pruebas/productos.php');
require_once('../pruebas/comentarios.php');
require_once('../app/Usuarios.php');
require_once('../app/Cliente.php');
require_once('../pruebas/comentarios_dinamicos.php');


try {
    $con = new PDO('mysql:host=' . $hostname . ';dbname=' . $database . ';port=' . $puerto, $username, $password);
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage();
    die();
}


$Continente = new Continente($con);
$Pais = new Pais($con);
$Productos = new Productos($con);
$Comentarios = new Comentarios($con);
$Usuario = new Usuario($con);
$Cliente = new Cliente($con);
$ComentariosDinamicos = new ComentariosDinamicos($con);

if (isset($_POST['login'])) {
    $Usuario->login($_POST);
}

 if (isset($_GET['logout'])) {
    unset($_SESSION['usuario']);
} 

if ($Usuario->notLogged() && ($page != "login")) {
    header('Location: login.php');
}

?>