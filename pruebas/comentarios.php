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
		$sql = "INSERT INTO comentarios (id, email, ranqueo, comentario, fecha, ip, productos_id) 
		VALUES ('1', 'email', '5', 'comentario', '2020', '127.0.0.1', '1')";

		$this->con->exec($sql);
    }
}

?>