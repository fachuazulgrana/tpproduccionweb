<?php require_once('../pruebas/mysql-login.php'); ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Styles -->
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="<?php echo RUTA_CSS ?>bootstrap.min.css">
<link rel="stylesheet" href="<?php echo RUTA_CSS ?>jquery.fancybox.min.css" />
<script src="<?php echo RUTA_JS ?>jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');

require_once('../pruebas/continente.php');
require_once('../pruebas/pais.php');
require_once('../pruebas/productos.php');
require_once('../pruebas/comentarios.php');


try{
	$con = new PDO('mysql:host='.$hostname.';dbname='.$database.';port='.$puerto, $username, $password);
}catch (PDOException $e){
	print "¡Error!: " . $e->getMessage();
	die();
}


$Continente = new Continente($con);
$Pais = new Pais($con);
$Productos = new Productos($con);
$Comentarios = new Comentarios($con);
?>


<!--
        if(isset($_POST['login'])){
        $user->login($_POST);
    }

    if(isset($_GET['login'])){
        unset($_SESSION['usuario']);
    }

    if($user->notLogged()){
        header('Location: login.php');
    }
-->