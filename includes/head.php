<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Styles -->
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nothing+You+Could+Do&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nothing+You+Could+Do&family=Rubik:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/jquery.fancybox.min.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="js/jquery-3.5.1.min.js"></script>


<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
	
require_once('pruebas/mysql-login.php');

require_once('pruebas/continente.php');
require_once('pruebas/pais.php');
require_once('pruebas/productos.php');
require_once('pruebas/comentarios.php');


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