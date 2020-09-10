<?php

class Contienente{

	private $con;
	
	function __construct($con){
		$this->con= $con;
	}

	public function getContienente(){
		$query = "SELECT * FROM continentes";
		return $this->con->query($query);
	}
}

?>