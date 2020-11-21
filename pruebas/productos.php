<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
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

        return $productos;
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
        $sql = "UPDATE productos SET " . implode(',', $columns) . " WHERE id = " . $id;
        $this->con->exec($sql);

        $sql = '';
        $sql = 'DELETE FROM productos_comentarios_dinamicos WHERE productos_id = ' . $id;
        $this->con->exec($sql);

        if(isset($data['comentario'])){

        $sql = '';
        foreach ($data['comentario'] as $comentario) {
            $sql .= 'INSERT INTO productos_comentarios_dinamicos(productos_id,comentarios_dinamicos_id) 
                        VALUES (' . $id . ',' . $comentario . ');';
        }
        $this->con->exec($sql);

    }

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

        if(isset($data['label'])){
        $sql = '';

        foreach ($data['label'] as $k => $campo) {
            if (!is_array($campo)) {
                if ($campo != null) {
                    $desc = $data['text'][$k];
                    $sql .= "INSERT INTO `campos_dinamicos`(`producto_id`, `label`, `valores`) VALUES ($id,'$campo','$desc');";
                }
            }
        }
        $this->con->exec($sql);
    }
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

        $this->con->exec($sql);

        if(isset($data['label'])){

        $sql = '';

        foreach ($data['label'] as $k => $campo) {
            if (!is_array($campo)) {
                if ($campo != null) {
                    $desc = $data['text'][$k];
                    $sql .= "INSERT INTO `campos_dinamicos`(`producto_id`, `label`, `valores`) VALUES ($id,'$campo','$desc');";
                }
            }
        }
        $this->con->exec($sql);
    }
        $sql = '';
        if (isset($data['comentario'])) {
            foreach ($data['comentario'] as $comentario) {
                $sql .= 'INSERT INTO productos_comentarios_dinamicos(productos_id,comentarios_dinamicos_id) 
                        VALUES (' . $id . ',' . $comentario . ');';
            }
            $this->con->exec($sql);
        }
    }

    public function del($id)
    {
        $query = "SELECT count(1) as cantidad FROM productos WHERE id = " . $id;
        $consulta = $this->con->query($query)->fetch();

        $sql = 'SELECT count(1) as comentarios FROM productos_comentarios_dinamicos WHERE productos_id = ' . $id;
        $co = $this->con->query($sql)->fetch();
        
        if ($co['comentarios'] != 0) {
            $sql = 'DELETE FROM productos_comentarios_dinamicos WHERE productos_id = ' . $id;
            $this->con->exec($sql);
        }
        $sql = '';
        $sql = 'SELECT count(1) as campos FROM campos_dinamicos WHERE producto_id = ' . $id;
        $campos_din = $this->con->query($sql)->fetch();

        if ($campos_din['campos'] != 0) {
            $sql = 'DELETE FROM productos_campos_dinamicos WHERE productos_id = ' . $id;
            $this->con->exec($sql);
        }

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
