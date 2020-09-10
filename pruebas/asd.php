header.php

requiere_once('inc/db_con.php');
try{
	$con = new PDO('mysql:host='.$hostname.';dbname='.$database.';port='.$puerto, $username, $password);
}catch (PDOException $e){
	print "¡Error!: " . $e->getMessage();
	die();
}



categorias.php

class Categorias{

	private $con;
	
	function __construct($con){
		$this->con= $con;
	}

	public function getCategorias(){
		$query = "SELECT * FROM categorias";
		return $this->con->query($query);
	}
}



marcas.php

class Marcas{

	private $con;
	
	function __construct($con){
		$this->con= $con;
	}

	public function getMarcas(){
		$query = "SELECT * FROM marcas";
		return $this->con->query($query);
	}
}



productos.php

class Productos{

	private $con;
	
	function __construct($con){
		$this->con= $con;
	}

	public function getProductos(){
		$query = "SELECT * FROM productos";
		return $this->con->query($query);
	}
}



