<?php

class ContinentePrueba{

	private $con;
	
	function __construct($con){
		$this->con= $con;
	}

	public function getContinente(){
		$query = "SELECT * FROM continentes";
		return $this->con->query($query);
	}
}

?>
