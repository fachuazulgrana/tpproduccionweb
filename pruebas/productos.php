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
		$query = "SELECT productos.*, AVG(comentarios.calificacion) as avgcomentarios FROM productos
		INNER JOIN paises ON paises.activo = 1 AND productos.paises_id = paises.id
		INNER JOIN continentes ON continentes.activo = 1 AND paises.continentes_id = continentes.id
		LEFT JOIN comentarios ON comentarios.activo = 1 AND comentarios.productos_id = productos.id
		WHERE productos.activo = 1 GROUP BY productos.nombre";

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

		// Union de array elements con un string
		if (!empty($where)) {
			$query .= ' AND ' . implode(' AND ', $where);
		}

		// Si orden NO esta vacio
		if (!empty($filtro['orden'])) {
			// Si orden == 1 (destacado)
			if ($filtro['orden'] == 1) {
				$query .= ' ORDER BY destacado DESC ';
				// Si orden NO es calificacion, ordena por nombre ASC o DESC pasado por parametro
			} else if ($filtro['orden'] != 'calificacion') {
				$query .= ' ORDER BY productos.nombre ' . $filtro['orden'];
				// Si orden != 1 y != 'calificacion', ordena por promedio de calificacion de los productos DESC 
			} else {
				$query .= ' ORDER BY avgcomentarios DESC';
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

	public function getProdName($comId)
	{
		$query = "SELECT productos.nombre AS nombre FROM productos WHERE productos.id =" . $comId['productos_id'];
		$resultado = $this->con->query($query)->fetch();
		return $resultado['nombre'];
	}

	public function getCookies(){
		$query = "SELECT * FROM productos";
		return $this->con->query($query);

	}
}
