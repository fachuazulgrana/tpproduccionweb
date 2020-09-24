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
}
