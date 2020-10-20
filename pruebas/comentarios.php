<?php

class Comentarios
{

	private $con;

	function __construct($con)
	{
		$this->con = $con;
	}

	public function getComentarios($filtro = array())
	{
		if (!empty($filtro['id'])) {
			$productos_id = $filtro['id'];
			$query = "SELECT * FROM comentarios WHERE comentarios.activo = 1 AND productos_id = $productos_id ORDER BY id DESC LIMIT 10";
			return $this->con->query($query);
		}
	}

	public function setComentarios()
	{

		$producto_id = $_GET['id'];
		$fecha = date("y/m/d");
		/* 		$fecha_disponible = date("y/m/d", strtotime($fecha . "- 1 days")); */
		$ip = $_SERVER['REMOTE_ADDR'];
		$query = "SELECT * FROM comentarios WHERE comentarios.productos_id = '$producto_id' AND comentarios.ip = '$ip' AND comentarios.fecha >= '$fecha'";

		$res = $this->con->query($query);
		$num_rows = $res->rowCount();

		if ($num_rows == 0) {
			if (isset($_POST['comentar'])) {
				if (strlen($_POST['nombre']) >= 1 && strlen($_POST['email']) >= 1) {
					$name = $_POST['nombre'];
					$email = $_POST['email'];
					$calificacion = $_POST['estrellas'];
					$comentario = $_POST['comentario'];
					$fechareg = date("y/m/d");
					// $data['fecha'] = date('d/m/Y H:i:s');
					// $fecha = new DateTime();
					$ip = $_SERVER['REMOTE_ADDR'];
					$producto_id = $_POST['productos_id'];
					$sql = "INSERT INTO comentarios (`nombre`, `email`, `calificacion`, `comentario`, `fecha`, `ip`, `productos_id`) VALUES ('$name', '$email', '$calificacion', '$comentario','$fechareg','$ip','$producto_id')";
					$this->con->exec($sql);
				}
			}
		}
	}

	public function getRanqueo($ciudades_id)
	{
		if ($ciudades_id) {
			$query = "SELECT AVG(calificacion) AS ranking FROM comentarios WHERE comentarios.activo = 1 AND productos_id =" . $ciudades_id;
			$resultado = $this->con->query($query)->fetch();
		} else {
			$query = "SELECT AVG(calificacion) AS ranking FROM comentarios WHERE comentarios.activo = 1 AND productos_id =" . $_GET['id'];
			$resultado = $this->con->query($query)->fetch();
		}
		return number_format($resultado['ranking'], 1);
	}

	/* $sql = "INSERT INTO comentarios (email, ranqueo, comentario, fecha, ip, productos_id) 
		VALUES ('email', '5', 'comentario', '2020', '127.0.0.1', '1')"; 
		$this->con->exec($sql);*/
}
