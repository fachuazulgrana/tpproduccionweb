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
    
    public function setComentarios(){
		$this->con->query($query = "INSERT FROM comentarios");
    }
}

?>