<?php

class PaisPrueba{

	private $con;
	
	function __construct($con){
		$this->con= $con;
	}

	public function getPais(){
		$query = "SELECT * FROM paises";
		return $this->con->query($query);
	}
}

?>
