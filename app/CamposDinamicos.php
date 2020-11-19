<?php
class CamposDinamicos
{

	private $con;

	function __construct($con)
	{
		$this->con = $con;
	}


	public function getList()
    {
        $query = 'SELECT * FROM campos_dinamicos';
        return $this->con->query($query);
	}
	

	public function get($id)
	{
		$query = "SELECT * FROM campos_dinamicos WHERE id = " . $id;
		$query = $this->con->query($query);

		$campos = $query->fetch(PDO::FETCH_OBJ);

		return $campos;
	}

	public function del($id)
	{

		$sql = "SELECT count(1) as campo FROM productos_campos_dinamicos WHERE campo_dinamico_id = " . $id;
		$campoDin = $this->con->query($sql)->fetch();

		if ($campoDin->campo == 0) {
			$sql = '';
			$sql = "DELETE FROM productos_campos_dinamicos WHERE campo_dinamico_id = " . $id;
			$this->con->exec($sql);
		}


		$query = "SELECT count(1) as cantidad FROM campos_dinamicos WHERE id = " . $id;

		$consulta = $this->con->query($query)->fetch();

		if ($consulta->cantidad == 0) {
			$query = "DELETE FROM campos_dinamicos WHERE id = " . $id;

			$this->con->exec($query);
			return 1;
		}

		return "Campo dinamico eliminado";
	}

	public function edit($data)
	{
		$id = $data['id'];
		unset($data['id']);

		foreach ($data as $key => $value) {
			if (!is_array($value)) {
				if ($value != null) {
					$columns[] = $key . " = '" . $value . "'";
				}
			}
		}

		$sql = "UPDATE campos_dinamicos SET " . implode(',', $columns) . " WHERE id = " . $id;

		$this->con->exec($sql);
	}

	public function save($data)
	{
		foreach ($data as $key => $value) {
			if (!is_array($value)) {
				if ($value != null) {
					$columns[] = $key;
					$datos[] = $value;
				}
			}
		}
		$sql = "INSERT INTO campos_dinamicos(" . implode(',', $columns) . ") VALUES('" . implode("','", $datos) . "')";
		$this->con->exec($sql);

	}
}
