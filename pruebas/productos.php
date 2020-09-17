<?php

class Productos{

	private $con;
	
	function __construct($con){
		$this->con= $con;
	}

	public function getProductos($filtro = array(), $orden){
		/*
			--comandos para el sql--

			SELECT * FROM productos ORDER BY nombre ASC
			SELECT * FROM productos ORDER BY nombre DESC
			SELECT * FROM productos ORDER BY rand() LIMIT 6

			SELECT * FROM productos
			SELECT * FROM productos WHERE categoria_id = $filtro['cat']
			SELECT * FROM productos WHERE marca_id = $filtro['marca']
			SELECT * FROM productos WHERE marca_id = $filtro['marca'] AND categoria_id = $filtro['cat']



			--esto es algo que explicó el profe para filtrar--

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



			--función random--

			public function getProductosHomeRandom(){
				return $this->con->query("SELECT * FROM productos ORDER BY rand() LIMIT 6");
			}



			--ordenar A a Z, Z a A y destacado--

			if(!empty($filtro['order']) == 'AZ'){
				$query .= ' ORDERBY nombre ASC';
			} elseif (!empty($filtro['order']) == 'ZA'){
				$query .= ' ORDERBY nombre DESC';
			} elseif {
				$query .= ' ORDERBY destacado ASC';
			}



			--esto es para saber la IP de la persona--

			echo $_SERVER['REMOTE_ADDR'];
		*/
		$query = "SELECT * FROM productos ";

		$where = array();

		if (!empty($filtro['continente']) ){
			$where[] = ' continentes_id = '.$filtro['continente'];
		}

		if (!empty($filtro['pais']) ){
			$where[] = ' paises_id = '.$filtro['pais'];
		}

		if (!empty($filtro['ciudad']) ){
			$where[] = ' id = '.$filtro['ciudad'];
		}



		if (!empty($where) ){
			$query .= ' WHERE '.implode (' AND ',$where);
		}

		if (!empty($orden)){
			$query .= ' ORDER BY nombre ' . $orden;
		} else {
			$query .= ' ORDER BY nombre ASC';
		}

/* 
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
		} */

/* 		if($orden == "ASC"){
			$query .= ' BY nombre ASC';
		} */

		return $this->con->query($query);
	}





	public function getProductosDestacados(){

		$query = "SELECT * FROM productos WHERE destacado = 1 ORDER BY rand() LIMIT 6";
		return $this->con->query($query);
	}

}

?>