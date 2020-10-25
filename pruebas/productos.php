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
		$query = "SELECT productos.* FROM productos
		INNER JOIN paises ON paises.activo = 1 AND productos.paises_id = paises.id
		INNER JOIN continentes ON continentes.activo = 1 AND paises.continentes_id = continentes.id
		WHERE productos.activo = 1 ";

		$where = array();

		// $_GET continente = ?
		if (!empty($filtro['continente'])) {
			$where[] = ' paises.continentes_id = ' . $filtro['continente'];
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
		//if(!empty($filtro['orden'])){
		//	$where[] = ' productos.id = comentarios.productos_id';
		//	$query .= ' ORDER BY AVG(comentarios.calificacion) '; //INNER JOIN comentarios ON comentarios.activo = 1 AND comentarios.productos_id = productos.id
		//}

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
		//$query = "SELECT * FROM productos WHERE destacado = 1 ORDER BY rand() LIMIT 6";
		$query = "SELECT productos.* FROM productos
		INNER JOIN paises ON paises.activo = 1 AND productos.paises_id = paises.id
		INNER JOIN continentes ON continentes.activo = 1 AND paises.continentes_id = continentes.id
		WHERE productos.activo = 1 AND productos.destacado = 1 "; //ORDER BY rand() LIMIT 6
		return $this->con->query($query);
	}
	
	public function getProd()
	{
		$query = "SELECT * FROM productos";
		return $this->con->query($query);
	}

	public function getProdName()
	{
		$query = "SELECT productos.nombre FROM productos INNER JOIN comentarios ON comentarios.productos_id = productos.id";
		$resultado = $this->con->query($query)->fetch();
		return $resultado['nombre'];
	}
}
