<?php

class Continente
{

	private $con;

	function __construct($con)
	{
		$this->con = $con;
	}

	// ***********************
	//     FRONT END
	// ***********************

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

	// ***********************
	//       BACK END
	// ***********************

	public function getCont(){
		$query = "SELECT * FROM continentes";
		return $this->con->query($query);
	}

	/*public function getProdName()
	{
		$query = "SELECT productos.nombre AS nombre FROM productos INNER JOIN comentarios ON comentarios.productos_id = productos.id";
		$resultado = $this->con->query($query)->fetch();
		return $resultado['nombre'];
	}*/

	public function get($id)
    {
        $query = "SELECT * FROM continentes WHERE id = " . $id;
        $query = $this->con->query($query);
		
		$continentes = $query->fetch(PDO::FETCH_OBJ);

		$sql = "SELECT id FROM continentes WHERE id = " . $continentes->id;
		
        foreach ($this->con->query($sql) as $conti) {
            $continentes->array[] = $conti['id'];
        }
        return $continentes;
    }

    public function del($id)
    {
        $query = "SELECT count(1) as cantidad FROM continentes WHERE id = " . $id;

        $consulta = $this->con->query($query)->fetch();

        if ($consulta->cantidad == 0) {
            $query = "DELETE FROM continentes WHERE id = " . $id;

            $this->con->exec($query);
            return 1;
        }

        return "Continente eliminado";
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
        $sql = "INSERT INTO continentes(" . implode(',', $columns) . ") VALUES('" . implode("','", $datos) . "')";
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

        $sql = "UPDATE continentes SET " .implode(',',$columns)." WHERE id = " .$id;

        $this->con->exec($sql);
    }
}
