<?php
require_once 'mysql-login.php';

try{
	$con = new PDO('mysql:host='.$hostname.';dbname='.$database.';port='.$puerto, $username, $password);
}catch (PDOException $e){
	print "¡Error!: " . $e->getMessage();
	die();
}
?>