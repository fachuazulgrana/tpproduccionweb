<?php
class ComentariosDinamicos{

	private $con;

	function __construct($con){
		$this->con = $con;
	}

	public function getComDin()
	{
		$query = 'SELECT * FROM comentarios_dinamicos';
		return $this->con->query($query);
	}

	public function get($id)
	{
		$query = "SELECT * FROM comentarios_dinamicos WHERE id = " . $id;
		$query = $this->con->query($query);

		$comentarios = $query->fetch(PDO::FETCH_OBJ);

		$sql = "SELECT id FROM comentarios_dinamicos WHERE id = " . $comentarios->id;

		foreach ($this->con->query($sql) as $comdi) {
			$comentarios->array[] = $comdi['id'];
		}
		return $comentarios;
	}

	public function del($id)
	{
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

        $id = $this->con->lastInsertId();
    }

    public function edit($data){
        $id = $data['id'];
        unset($data['id']);

        foreach ($data as $key => $value){
            if(!is_array($value)){
                if($value != null){
                    $columns[]=$key." = '".$value."'";
                }
            }
        }

        $sql = "UPDATE comentarios_dinamicos SET " .implode(',',$columns)." WHERE id = " .$id;

        $this->con->exec($sql);
    }


}
