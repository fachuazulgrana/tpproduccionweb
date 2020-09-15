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
		$query = "SELECT * FROM productos WHERE 1 = 1";

		if(!empty($filtro['continente'])){
			$query .= ' AND continentes_id  =' . $filtro['continente'];
		}

		if(!empty($filtro['pais'])){
			$query .= ' AND paises_id  =' . $filtro['pais'];
		}

		if(!empty($where)){
			$query .= 'WHERE ' .implode(' AND ', $where);
		}

		if(!empty($filtro['ciudad'])){
			$query .= ' AND id  =' . $filtro['ciudad'];
		}

		return $this->con->query($query);
	}

	public function getProductosDestacados(){

		$query = "SELECT * FROM productos WHERE destacado = 1";
		return $this->con->query($query);
	}

}

?>