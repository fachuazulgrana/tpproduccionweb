<?php

class Productos
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function get($id)
    {
		$query = "SELECT * FROM productos WHERE id = " . $id;
		$query = $this->con->query($query);

		$productos = $query->fetch(PDO::FETCH_OBJ);

		$sql = "SELECT id FROM productos WHERE id = " . $productos->id;

		foreach ($this->con->query($sql) as $producto) {
			$productos->array[] = $producto['id'];
		}
		return $productos;
    }

    public function del($id)
    {
        $query = "SELECT count(1) as cantidad FROM productos WHERE id = " . $id;
        $consulta = $this->con->query($query)->fetch();

        if ($consulta->cantidad == 0) {
            $query = "DELETE FROM productos WHERE id = " . $id;

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
        $sql = "INSERT INTO productos(" . implode(',', $columns) . ") VALUES('" . implode("','", $datos) . "')";
        $this->con->exec($sql);

        $id = $this->con->lastInsertId();
    }

    public function edit($data)
    {
        $id = $data['id'];
        unset($data['id']);

        foreach ($data as $key => $value) {
            if (!is_array($value)) {
                if ($value != null) {
                    $columns[] = $key." = '".$value."'";
                }
            }
        }
        $sql = "UPDATE productos SET " .implode(',',$columns)." WHERE id = " .$id;
        $this->con->exec($sql);
    }

    public function getProductos($filtro = array())
    {
        $query = "SELECT productos.*, AVG(comentarios.calificacion) as avgcomentarios FROM productos
		INNER JOIN paises ON paises.activo = 1 AND productos.paises_id = paises.id
		INNER JOIN continentes ON continentes.activo = 1 AND paises.continentes_id = continentes.id
		LEFT JOIN comentarios ON comentarios.activo = 1 AND comentarios.productos_id = productos.id
		WHERE productos.activo = 1";

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
                $query .= ' GROUP BY productos.nombre ORDER BY productos.destacado DESC ';
            // Si orden NO es calificacion, ordena por nombre ASC o DESC pasado por parametro
            } elseif ($filtro['orden'] != 'calificacion') {
                $query .= ' GROUP BY productos.nombre ORDER BY productos.nombre ' . $filtro['orden'];
            // Si orden != 1 y != 'calificacion', ordena por promedio de calificacion de los productos DESC
            } else {
                $query .= ' GROUP BY productos.nombre ORDER BY avgcomentarios DESC';
            } 
        } else {
            $query .= ' GROUP BY productos.id ASC';
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

    public function getProd($limit, $pagStart)
    {
        $query = "SELECT * FROM productos ORDER BY nombre LIMIT $pagStart, $limit";
        return $this->con->query($query);
    }

    public function getPagination()
    {
        $query = "SELECT count(id) AS id FROM productos";
        $resultado = $this->con->query($query)->fetch();
        return $resultado['id'];
    }

    public function getProdName($comId)
    {
        $query = "SELECT productos.nombre AS nombre FROM productos WHERE productos.id =" . $comId['productos_id'];
        $resultado = $this->con->query($query)->fetch();
        return $resultado['nombre'];
    }
}
