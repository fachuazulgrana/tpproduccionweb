<?php

class Productos{

	private $con;
	
	function __construct($con){
		$this->con= $con;
	}

	public function getProductos($filtro = array()){
		/*
			SELECT * FROM productos ORDER BY nombre ASC
			SELECT * FROM productos ORDER BY nombre DESC
			SELECT * FROM productos ORDER BY rand() LIMIT 6

			SELECT * FROM productos
			SELECT * FROM productos WHERE categoria_id = $filtro['cat']
			SELECT * FROM productos WHERE marca_id = $filtro['marca']
			SELECT * FROM productos WHERE marca_id = $filtro['marca'] AND categoria_id = $filtro['cat']

			$where = array();

			if (!empty($filtro['cat']) ){
				$where[] = ' categoria_id = '.$filtro['cat'];
			}

			if (!empty($filtro['cat']) ){
				$where[] = ' marca_id = '.$filtro['marca'];
			}

			if (!empty($filtro['cat']) ){
				$query .= ' WHERE '.implode (' AND ',$where);
			}

			public function getProductosHomeRandom(){
				return $this->con->query("SELECT * FROM productos ORDER BY rand() LIMIT 6");
			}
		*/
		$query = "SELECT * FROM productos";
		return $this->con->query($query);
	}
}

?>