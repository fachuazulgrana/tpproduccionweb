<?php
require_once 'mysql-login.php';

try{
	$con = new PDO('mysql:host='.$hostname.';dbname='.$database.';port='.$puerto, $username, $password);
}catch (PDOException $e){
?>
	<!-- print "¡Error!: " . $e->getMessage(); -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<button class="btn btn-primary" disabled>
    <span class="spinner-border spinner-border-sm"></span>
    	Error, por favor recargar la página...
  	</button>
<?php
	die();
}
?>