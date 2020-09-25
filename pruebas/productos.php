<?php

class Productos
{

	private $con;

	function __construct($con)
	{
		$this->con = $con;
	}

	public function getProductos($filtro = array(), $orden)
	{
		/*
		SELECT 
		productos.id, 
		productos.nombre, 
		productos.descripcion, 
		productos.detalle, 
		productos.precio, 
		productos.continentes_id, 
		productos.paises_id
		FROM productos
        INNER JOIN continentes cont ON " . $filtro['continente'] . " = cont.id AND productos.activo = 1
        INNER JOIN paises p ON " . $filtro['pais'] . " = p.id AND productos.activo = 1
        INNER JOIN productos pro ON " . $filtro['ciudad'] . " = pro.id AND pro.activo = 1
        WHERE productos.continentes_id = 1 AND productos.paises_id = 1 AND productos.id = 1
		*/

		$query = "SELECT 
		productos.id, 
		productos.nombre, 
		productos.descripcion, 
		productos.detalle, 
		productos.precio, 
		productos.continentes_id, 
		productos.paises_id
		FROM productos";

		$where = array();

		// Si $_GET continente pais y ciudad vacios, retorna todos los productos activos
		if (empty($filtro['continente']) && empty($filtro['pais']) && empty($filtro['ciudad'])) {
			$query .= ' WHERE productos.activo = 1';
		} else {
			// $_GET continente = ?
			if (!empty($filtro['continente'])) {
				$innerCont = " INNER JOIN continentes cont ON " . $filtro['continente'] . " = cont.id AND cont.activo = 1";
				$query .= $innerCont;
				$where[] = ' productos.continentes_id = ' . $filtro['continente'];
			}

			// $_GET pais = ?
			if (!empty($filtro['pais'])) {
				$innerPais = " INNER JOIN paises p ON " . $filtro['pais'] . " = p.id AND p.activo = 1";
				$query .= $innerPais;
				$where[] = ' productos.paises_id = ' . $filtro['pais'];
			}

			// $_GET ciudad = ?
			if (!empty($filtro['ciudad'])) {
				$innerCiudad = " INNER JOIN productos pro ON " . $filtro['ciudad'] . " = pro.id AND pro.activo = 1";
				$query .= $innerCiudad;
				$where[] = ' productos.id = ' . $filtro['ciudad'];
			}

			// Union de array elements con un string
			if (!empty($where)) {
				$query .= ' WHERE ' . implode(' AND ', $where);
			}
		}

		// Agregado a query final el ORDER BY
		if (!empty($orden)) {
			$query .= ' ORDER BY nombre ' . $orden;
		} else {
			$query .= ' ORDER BY nombre ASC';
		}

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
}
