<?php

class Pais{

	private $con;
	
	function __construct($con){
		$this->con= $con;
	}

	public function getPais($filtro = array()){
		$query = "SELECT * FROM paises WHERE 1 = 1";

		if(!empty($filtro['continente'])){
			$query .= ' AND continentes_id  =' . $filtro['continente'];
		}

		return $this->con->query($query);

	}

	public function getNamePais(){
		$query = "SELECT paises.nombre AS nombre FROM paises INNER JOIN continentes ON paises.continentes_id = continentes.id INNER JOIN productos ON paises.id = productos.paises_id WHERE productos.id =" . $_GET['id'];
		$resultado = $this->con->query($query)->fetch();
		//var_dump($resultado);
		return $resultado['nombre'];
	}
}

?>