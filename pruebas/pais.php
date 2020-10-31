<?php

class Pais{

	private $con;
	
	function __construct($con){
		$this->con= $con;
	}

	// ***********************
	//     FRONT END
	// ***********************

	public function getPais($filtro = array()){
		/* $query = "SELECT * FROM paises WHERE 1 = 1"; */
		$query = "SELECT paises.id, paises.nombre FROM paises
		INNER JOIN continentes ON continentes.activo = 1 AND paises.continentes_id = continentes.id
		WHERE paises.activo = 1";


		if(!empty($filtro['continente'])){
			$query .= ' AND continentes_id  =' . $filtro['continente'];
		}

		return $this->con->query($query);

	}

	public function getNamePais(){
		$query = "SELECT paises.nombre AS nombre FROM paises INNER JOIN continentes ON paises.continentes_id = continentes.id INNER JOIN productos ON paises.id = productos.paises_id WHERE productos.id =" . $_GET['id'];
		$resultado = $this->con->query($query)->fetch();
		//var_dump($resultado);
		return $resultado['nombre'];
	}

	// ***********************
	//       BACK END
	// ***********************

	public function getPaises(){
        $query = "SELECT * FROM paises";
		return $this->con->query($query);
    }
    
	public function getPaisName($prodId)
	{
		$query = "SELECT paises.nombre AS nombre FROM paises WHERE id =". $prodId['paises_id'];
		$resultado = $this->con->query($query)->fetch();
		return $resultado['nombre'];
	}
    
	/*
	public function getCont(){
		$query = "SELECT * FROM continentes";
		return $this->con->query($query);
	}

    public function getProdName()
	{
		$query = "SELECT productos.nombre AS nombre FROM productos INNER JOIN comentarios ON comentarios.productos_id = productos.id";
		$resultado = $this->con->query($query)->fetch();
		return $resultado['nombre'];
	}*/

	public function get($id)
    {
        $query = "SELECT * FROM paises WHERE id = " . $id;
        $query = $this->con->query($query);
		
		$paises = $query->fetch(PDO::FETCH_OBJ);

		$sql = "SELECT id FROM paises WHERE id = " . $paises->id;
		
        foreach ($this->con->query($sql) as $pai) {
            $paises->array[] = $pai['id'];
        }
        return $paises;
    }

    public function del($id)
    {
        $query = "SELECT count(1) as cantidad FROM paises WHERE id = " . $id;

        $consulta = $this->con->query($query)->fetch();

        if ($consulta->cantidad == 0) {
            $query = "DELETE FROM paises WHERE id = " . $id;

            $this->con->exec($query);
            return 1;
        }

        return "País eliminado";
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
        $sql = "INSERT INTO paises(" . implode(',', $columns) . ") VALUES('" . implode("','", $datos) . "')";
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

        $sql = "UPDATE paises SET " .implode(',',$columns)." WHERE id = " .$id;

        $this->con->exec($sql);
    }
}

?>