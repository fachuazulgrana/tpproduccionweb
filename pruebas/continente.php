<?php

class Continente
{

	private $con;

	function __construct($con)
	{
		$this->con = $con;
	}

	public function getContinente($activo)
	{
		$query = "SELECT * FROM continentes";

		// Activo = 1 , Inactivo = 0
		$where[] = ' activo = ' . $activo;

		if (!empty($where)) {
			$query .= ' WHERE ' . implode(' AND ', $where);
		}

		return $this->con->query($query);
	}

	public function getNameContinente(){
		$query = "SELECT continentes.nombre AS nombre FROM continentes INNER JOIN paises ON continentes.id = paises.continentes_id INNER JOIN productos ON paises.id = productos.paises_id WHERE productos.id =" . $_GET['id'];
		$resultado = $this->con->query($query)->fetch();
		//var_dump($resultado);
		return $resultado['nombre'];
	}
}
