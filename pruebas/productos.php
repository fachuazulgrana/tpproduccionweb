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
		$query = "SELECT 
		productos.id, 
		productos.nombre, 
		productos.precio, 
		productos.descripcion, 
		productos.continentes_id, 
		productos.paises_id, 
		productos.activo, 
		productos.detalle, 
		productos.destacado FROM productos
		INNER JOIN paises ON paises.activo = 1 AND productos.paises_id = paises.id
		INNER JOIN continentes ON continentes.activo = 1 AND paises.continentes_id = continentes.id
		WHERE productos.activo = 1 ";

		$where = array();

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

		/* if (!empty($filtro['orden'])) {
			if ($filtro['orden'] == 1) {
				$where[] = ' ORDER BY destacado ASC ';
			}
		} */

		// Union de array elements con un string
		if (!empty($where)) {
			$query .= ' AND ' . implode(' AND ', $where);
		}

		if (!empty($filtro['orden'])) {
			if ($filtro['orden'] != 1) {
				$query .= ' ORDER BY nombre ' . $filtro['orden'];
			} else {
				$query .= ' ORDER BY destacado DESC ';
			}
		}

		return $this->con->query($query);
	}

	public function getProductosDestacados()
	{
		$query = "SELECT * FROM productos WHERE destacado = 1 ORDER BY rand() LIMIT 6";
		return $this->con->query($query);
	}
}
