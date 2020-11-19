<?php
class ComentariosDinamicos
{

	private $con;

	function __construct($con)
	{
		$this->con = $con;
	}

	public function getComDin()
	{
		$query = 'SELECT * FROM comentarios_dinamicos INNER JOIN productos_comentarios_dinamicos ON (comentarios_dinamicos.id = productos_comentarios_dinamicos.comentarios_dinamicos_id)';
		return $this->con->query($query);
	}

	public function getDinamicos()
	{
		$query = 'SELECT * FROM comentarios_dinamicos';
		$resultado = array();
		foreach ($this->con->query($query) as $key => $comentario) {
			$resultado[$key] = $comentario;
			/* var_dump($resultado); */
			$sql = 'SELECT nombre 
            FROM productos 
            INNER JOIN productos_comentarios_dinamicos ON (productos_comentarios_dinamicos.productos_id = productos.id)
			WHERE productos_comentarios_dinamicos.comentarios_dinamicos_id = ' . $comentario['id'];
			foreach ($this->con->query($sql) as $coment) {
				$resultado[$key]['productos'][] = $coment['nombre'];
			}
		}
		return $resultado;
	}

	public function get($id)
	{
		$query = "SELECT * FROM comentarios_dinamicos WHERE id = " . $id;
		$query = $this->con->query($query);

		$comentarios = $query->fetch(PDO::FETCH_OBJ);

		return $comentarios;
	}

	public function del($id)
	{

		$sql = "SELECT count(1) as comentario FROM productos_comentarios_dinamicos WHERE comentarios_dinamicos_id = " . $id;
		$comentarioDin = $this->con->query($sql)->fetch();

		if ($comentarioDin->campo == 0) {
			$sql = '';
			$sql = "DELETE FROM productos_comentarios_dinamicos WHERE comentarios_dinamicos_id = " . $id;
			$this->con->exec($sql);
		}

		$query = "SELECT count(1) as cantidad FROM comentarios_dinamicos WHERE id = " . $id;

		$consulta = $this->con->query($query)->fetch();

		if ($consulta->cantidad == 0) {
			$query = "DELETE FROM comentarios_dinamicos WHERE id = " . $id;

			$this->con->exec($query);
			return 1;
		}

		return "Comentario dinamico eliminado";
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
		$sql = "INSERT INTO comentarios_dinamicos(" . implode(',', $columns) . ") VALUES('" . implode("','", $datos) . "')";
		$this->con->exec($sql);
	}

	public function edit($data)
	{
		$id = $data['id'];
		unset($data['id']);
		$prod_id = $data['productos_id'];
		unset($data['productos_id']);

		foreach ($data as $key => $value) {
			if (!is_array($value)) {
				if ($value != null) {
					$columns[] = $key . " = '" . $value . "'";
				}
			}
		}

		$sql = "UPDATE comentarios_dinamicos SET " . implode(',', $columns) . " WHERE id = " . $id;

		$this->con->exec($sql);
	}

	public function getList()
	{
		$query = 'SELECT * FROM comentarios_dinamicos';
		return $this->con->query($query);
	}
}
