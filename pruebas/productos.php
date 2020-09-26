<?php

class Productos
{

	private $con;

	function __construct($con)
	{
		$this->con = $con;
	}

	public function getProductos($filtro = array())
	{
		/* $query = "SELECT * FROM productos "; */
		$query = "SELECT productos.id, productos.nombre, productos.precio, productos.descripcion, productos.continentes_id, productos.paises_id, productos.activo, productos.detalle, productos.destacado FROM productos
		INNER JOIN paises ON paises.activo = 1 AND productos.paises_id = paises.id
		INNER JOIN continentes ON continentes.activo = 1 AND paises.continentes_id = continentes.id
		WHERE productos.activo = 1 ";

		$where = array();
		/* $where[] = ' activo = 1'; */
 
		// $_GET continente = ?
		if (!empty($filtro['continente'])) {
			$where[] = ' productos.continentes_id = ' . $filtro['continente'];
		}

		// $_GET pais = ?
		if (!empty($filtro['pais'])) {
			$where[] = ' productos.paises_id = ' . $filtro['pais'];
		}

		// $_GET ciudad = ?
		if (!empty($filtro['ciudad'])) {
			$where[] = ' productos.id = ' . $filtro['ciudad'];
		}

		if (!empty($filtro['orden'])) {
			if($filtro['orden'] == 1) {
				$where[] = ' productos.destacado = ' . $filtro['orden'] ;
			}
		}

		/* // Activo = 1 , Inactivo = 0
		$where[] = ' activo = ' . $activo; */

		// Union de array elements con un string
		if (!empty($where)) {
			$query .= ' AND ' . implode(' AND ', $where);
			
		}

		if (!empty($filtro['orden'])) {
			if($filtro['orden'] != 1) {
				$query .= ' ORDER BY nombre ' . $filtro['orden'];
			}
			}

		// Agregado a query final el ORDER BY
/* 		if (!empty($orden)) {
			$query .= ' ORDER BY nombre ' . $orden;
		} else {
			$query .= ' ORDER BY nombre ASC';
		} */

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





	public function getProductosDestacados()
	{

		$query = "SELECT * FROM productos WHERE destacado = 1 ORDER BY rand() LIMIT 6";
		return $this->con->query($query);
	}


	public function getProductosFiltro($filtro = array())
	{

		$query = "SELECT * FROM productos ";

		$where = array();

		if (!empty($filtro['continente'])) {
			$where[] = ' continentes_id = ' . $filtro['continente'];
		}

		if (!empty($filtro['pais'])) {
			$where[] = ' paises_id = ' . $filtro['pais'];
		}

		if (!empty($where)) {
			$query .= ' WHERE ' . implode(' AND ', $where);
		}

		return $this->con->query($query);
	}



	//ordenar A a Z, Z a A y destacado

	public function getProductosAcomodamiento($filtro = array(), $orden, $activo)
	{

		$query = "SELECT * FROM productos ";

		$where = array();

		if (!empty($filtro['continente'])) {
			$where[] = ' continentes_id = ' . $filtro['continente'];
		}

		if (!empty($filtro['pais'])) {
			$where[] = ' paises_id = ' . $filtro['pais'];
		}

		if (!empty($filtro['ciudad'])) {
			$where[] = ' id = ' . $filtro['ciudad'];
		}

        if(!empty($where)){
            $query .= ' WHERE '.implode(' AND ',$where);
        }

		// ORDER

	      if (!empty($filtro['order'])){
            if($filtro['order'] == 'AZ'){
                $query .= ' ORDER BY nombre ASC';
            }elseif($filtro['order'] == 'ZA'){
                $query .= ' ORDER BY nombre DESC';
            }else{
                $query .= ' ORDER BY destacados ASC';
            }
  		}else{
      		$query .= ' ORDER BY destacados ASC';
        }

			return $this->con->query($query);

		}


}

