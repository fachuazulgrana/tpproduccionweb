<?php
session_start();
require_once('../database/mysql-login.php');
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSS -->
<link rel="stylesheet" href="<?php echo RUTA_BACKEND_CSS ?>backend-style.css">
<link rel="stylesheet" href="<?php echo RUTA_CSS ?>bootstrap.min.css">
<link rel="stylesheet" href="<?php echo RUTA_CSS ?>jquery.fancybox.min.css" />
<!-- JS -->
<script src="<?php echo RUTA_JS ?>jquery-3.5.1.min.js"></script>
<!-- CDN  -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');

require_once(__DIR__ . '../../../app/Continente.php');
require_once(__DIR__ . '../../../app/Pais.php');
require_once(__DIR__ . '../../../app/Productos.php');
require_once(__DIR__ . '../../../app/Comentarios.php');
require_once(__DIR__ . '../../../app/Comentarios_dinamicos.php');

require_once(__DIR__ . '../../../app/Usuarios.php');
require_once(__DIR__ . '../../../app/Cliente.php');
require_once(__DIR__ . '../../../app/CamposDinamicos.php');

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
$CamposDinamicos = new CamposDinamicos($con);

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