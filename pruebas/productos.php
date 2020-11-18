<?php
// require_once '../pruebas2/functions/func.php';
class Productos
{

    private $con;

    function __construct($con)
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

        $query = 'SELECT comentarios_dinamicos_id
        FROM productos_comentarios_dinamicos  
        WHERE productos_comentarios_dinamicos.productos_id = ' . $productos->id;

        foreach ($this->con->query($query) as $com) {
            $productos->comentarios[] = $com['comentarios_dinamicos_id'];
        }

        $consult = 'SELECT campo_dinamico_id
        FROM productos_campos_dinamicos  
        WHERE productos_campos_dinamicos.productos_id = ' . $productos->id;


        foreach ($this->con->query($consult) as $camp) {
            $productos->campos[] = $camp['campo_dinamico_id'];
        }
        return $productos;
    }


    /* 
    public function getNO($id)
    {
        $query = "SELECT `id_usuario`,`nombre`, `apellido`, `email`, `usuario`,`clave`, `activo` FROM `usuarios` WHERE `id_usuario` = '$id' AND `borrado` = 0";
        $query = $this->con->query($query);

        $usuario = $query->fetch(PDO::FETCH_OBJ);

        $sql = 'SELECT perfil_id
					  FROM usuario_perfiles  
					  WHERE usuario_perfiles.usuario_id = ' . $usuario->id_usuario;

        foreach ($this->con->query($sql) as $perfil) {
            $usuario->perfiles[] = $perfil['perfil_id'];
        }
        return $usuario;
    } */






    public function edit($data)
    {
        $id = $data['id'];
        unset($data['id']);
/*         $campos[] = $data['campos'];
        unset($data['campos']);
        $comentarios[] = $data['comentarios'];
        unset($data['comentarios']); */

        foreach ($data as $key => $value) {
            if (!is_array($value)) {
                if ($value != null) {
                    $columns[] = $key . " = '" . $value . "'";
                }
            }
        }
        $sql = "UPDATE productos SET " . implode(',', $columns) . " WHERE id = " . $id;
        $this->con->exec($sql);

        $sql = '';
        $sql = 'DELETE FROM productos_campos_dinamicos WHERE productos_id = ' . $id;
        $this->con->exec($sql);

        $sql = '';
        foreach ($data['cualidad'] as $campo) {
            $sql .= 'INSERT INTO productos_campos_dinamicos(productos_id,campo_dinamico_id) 
                        VALUES (' . $id . ',' . $campo . ');';
        }
        $this->con->exec($sql);

        $sql = '';
        $sql = 'DELETE FROM productos_comentarios_dinamicos WHERE productos_id = ' . $id;
        $this->con->exec($sql);
        $sql = '';
        foreach ($data['comentario'] as $comentario) {
            $sql .= 'INSERT INTO productos_comentarios_dinamicos(productos_id,comentarios_dinamicos_id) 
                        VALUES (' . $id . ',' . $comentario . ');';
        }
        $this->con->exec($sql);

        // save image
        if (isset($_FILES['imagen'])) {
            $sizes = array(
                0 => array('nombre' => 'big', 'ancho' => '5000', 'alto' => '10000'),
                1 => array('nombre' => 'small', 'ancho' => '500', 'alto' => '1000'),
                2 => array('nombre' => 'thumb', 'ancho' => '50', 'alto' => '50')
            );
            $ruta = './images/' . $id . '/';
            if (!is_dir($ruta))
                mkdir($ruta);

            redimensionar($ruta, $_FILES['imagen']['name'], $_FILES['imagen']['tmp_name'], 0, $sizes);
        }
    }

    public function save($data)
    {
        $campo_id[] = $data['campos'];
        $comentarios_id[] = $data['comentarios'];
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

        // save image
        if (isset($_FILES['imagen'])) {
            $sizes = array(
                0 => array('nombre' => 'big', 'ancho' => '5000', 'alto' => '10000'),
                1 => array('nombre' => 'small', 'ancho' => '500', 'alto' => '1000'),
                2 => array('nombre' => 'thumb', 'ancho' => '50', 'alto' => '50')
            );
            $ruta = './images/' . $id . '/';
            if (!is_dir($ruta))
                mkdir($ruta);

            redimensionar($ruta, $_FILES['imagen']['name'], $_FILES['imagen']['tmp_name'], 0, $sizes);
        }

        foreach ($data['campos'] as $campo) {
            $sql .= 'INSERT INTO productos_campos_dinamicos(productos_id,campo_dinamico_id) 
                        VALUES (' . $id . ',' . $campo . ');';
        }

        foreach ($data['comentarios'] as $comentario) {
            $sql .= 'INSERT INTO productos_comentarios_dinamicos(productos_id,comentarios_dinamicos_id) 
                        VALUES (' . $id . ',' . $comentario . ');';
        }
        $this->con->exec($sql);
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


    public function getPagination()
    {
        $query = "SELECT count(id) AS id FROM productos";

        if (!empty($_GET['orden'])) {
            if ($_GET['orden'] == "1") {
                $query .= ' WHERE productos.activo = 1';
            } else {
                $query .= ' WHERE productos.activo = 0';
            }
        }

        $resultado = $this->con->query($query)->fetch();
        return $resultado['id'];
    }

    public function getProductos($filtro = array())
    {
        /*$query = "SELECT productos.* FROM productos
		INNER JOIN paises ON paises.activo = 1 AND productos.paises_id = paises.id
		INNER JOIN continentes ON continentes.activo = 1 AND paises.continentes_id = continentes.id
		WHERE productos.activo = 1 ";*/

        $query = "SELECT productos.*, AVG(comentarios.calificacion) as avgcomentarios FROM productos
		INNER JOIN paises ON paises.activo = 1 AND productos.paises_id = paises.id
		INNER JOIN continentes ON continentes.activo = 1 AND paises.continentes_id = continentes.id
		LEFT JOIN comentarios ON comentarios.activo = 1 AND comentarios.productos_id = productos.id
		WHERE productos.activo = 1"; // GROUP BY productos.nombre

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
                $query .= ' GROUP BY productos.nombre ORDER BY destacado DESC ';
                // Si orden NO es calificacion, ordena por nombre ASC o DESC pasado por parametro
            } else if ($filtro['orden'] != 'calificacion') {
                $query .= ' GROUP BY productos.nombre ORDER BY productos.nombre ' . $filtro['orden'];
                // Si orden != 1 y != 'calificacion', ordena por promedio de calificacion de los productos DESC 
            } else {
                $query .= ' GROUP BY productos.nombre ORDER BY avgcomentarios DESC';
            }
        } else {
            $query .= ' GROUP BY productos.id ASC ';
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
        $query = "SELECT * FROM productos";

        if (!empty($_GET['orden'])) {
            if ($_GET['orden'] == "1") {
                $query .= ' WHERE productos.activo = 1';
            } else {
                $query .= ' WHERE productos.activo = 0';
            }
        }

        $query .= " ORDER BY id LIMIT $pagStart, $limit";

        return $this->con->query($query);
    }

    public function getProdName($comId)
    {
        $query = "SELECT productos.nombre AS nombre FROM productos WHERE productos.id =" . $comId['productos_id'];
        $resultado = $this->con->query($query)->fetch();
        return $resultado['nombre'];
    }

    public function getCookies()
    {
        $query = "SELECT * FROM productos";
        return $this->con->query($query);
    }
}
