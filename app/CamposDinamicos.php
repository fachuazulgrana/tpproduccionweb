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

	public function getListByProd($id)
    {
        $query = 'SELECT * FROM campos_dinamicos WHERE producto_id = ' . $id;
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
		$query = "DELETE FROM campos_dinamicos WHERE id = " . $id;

		$this->con->exec($query);

		return 1;
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

	public function campoDinamicoexists($id){

		$query = "SELECT  count(1) as cantidad FROM campos_dinamicos WHERE producto_id = " . $id;
		$consulta = $this->con->query($query)->fetch(PDO::FETCH_OBJ);

		if ($consulta->cantidad != 0) {
            return 1;
		}
		return 0;
	}

/* 	public function del222222222($id)
    {
        $query = "SELECT count(1) as cantidad FROM usuario_perfiles WHERE perfil_id = " . $id;

        $consulta = $this->con->query($query)->fetch(PDO::FETCH_OBJ);

        if ($consulta->cantidad == 0) {
            $query = "DELETE FROM perfil_permiso WHERE perfil_id = " . $id . ";
            DELETE FROM perfiles WHERE id_perfil = " . $id . ";";

            $this->con->exec($query);
            return 1;
        }

        return "Perfil asignado a un usuario";
    } */
}
