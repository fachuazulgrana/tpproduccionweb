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
		$query = "SELECT paises.nombre FROM paises INNER JOIN productos ON paises.id = productos.paises_id";
		return $this->con->query($query);
	}
}

?>