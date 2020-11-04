<?php

class Cliente
{

    private $con;


    function __construct($con)
    {
        $this->con = $con;
    }

    public function get($id)
    {
        $query = "SELECT `id_usuario`,`nombre`, `apellido`, `email`, `user`, `activo` FROM `clientes` WHERE `borrado` = 0";
        $query = $this->con->query($query);

        $cliente = $query->fetch(PDO::FETCH_OBJ);

        return $cliente;
    }

    public function getClientes()
    {
        $query = 'SELECT * FROM clientes WHERE `borrado` = 0';
        $resultado = array();
        foreach ($this->con->query($query) as $key => $usuario) {
            $resultado[$key] = $usuario;
        }
        return $resultado;
    }


    public function del($id)
    {

        $query = "UPDATE `clientes` SET `borrado` = '1', `activo` = '0'  WHERE `clientes`.`id_usuario` = '$id'";
        $this->con->exec($query);
        return 1;
    }


    public function edit($id)
	{

		$query = "SELECT activo FROM clientes WHERE `clientes`.`id_usuario` = " . $id;

		$consulta = $this->con->query($query)->fetch();

		if ($consulta['activo'] == 0) {
			$query = "UPDATE clientes SET activo = 1 WHERE `clientes`.`id_usuario` = " . $id;

			$this->con->exec($query);
			return 1;
		}
		if ($consulta['activo'] == 1) {
			$query = "UPDATE clientes SET activo = 0 WHERE `clientes`.`id_usuario` = " . $id;

			$this->con->exec($query);
			return 1;
		}
		return "Cliente modificado";

    }
    

    
}