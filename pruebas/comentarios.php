<?php

class Comentarios{

	private $con;
	
	function __construct($con){
		$this->con= $con;
	}

	public function getComentarios(){
		$query = "SELECT * FROM comentarios";
		return $this->con->query($query);
	}
}

?>