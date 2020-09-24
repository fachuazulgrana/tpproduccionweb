<?php

class Continente{

	private $con;
	
	function __construct($con){
		$this->con= $con;
	}

	public function getContinente(){
		$query = "SELECT * FROM continentes";
		return $this->con->query($query);
	}

	public function getNameContinente(){
		$query = "SELECT continentes.nombre FROM continentes INNER JOIN productos ON continentes.id = productos.continentes_id";
		return $this->con->query($query);
	}
}

?>