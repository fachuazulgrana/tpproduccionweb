<?php

class Comentarios
{

	private $con;

	function __construct($con)
	{
		$this->con = $con;
	}

	// ***********************
	//     FRONT END
	// ***********************

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
		if (isset($_POST['comentar'])) {

			$producto_id = $_GET['id'];
			$fecha = date("y/m/d");
			/* 		$fecha_disponible = date("y/m/d", strtotime($fecha . "- 1 days")); */
			$ip = $_SERVER['REMOTE_ADDR'];
			$query = "SELECT * FROM comentarios WHERE comentarios.productos_id = '$producto_id' AND comentarios.ip = '$ip' AND comentarios.fecha >= '$fecha'";

			$res = $this->con->query($query);
			$num_rows = $res->rowCount();

			if ($num_rows == 0) {

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
					$sql = '';
					if (isset($_POST['adicional'])) {
						$id = $this->con->lastInsertId();
						foreach ($_POST['adicional'] as $adi) {
							foreach ($adi as $key => $val) {
								$sql .= "INSERT INTO `comentarios_dinamicos_data`(`comentario_original_id`, `comentario_id`, `informacion`) VALUES ($id,$key,'$val');";
							}
						}
						$this->con->exec($sql);
					}
?>
					</div>
					<div class="col-sm-12 col-md-12 py-2">
						<div class='alert alert-success'>
							Gracias por dejar su comentario! Será validado a la brevedad.
						</div>
				<?php
					unset($_POST);
					return;
				}
			}
				?>
					</div>
					<div class="col-sm-12 col-md-12 py-2">
						<div class='alert alert-danger'>
							No puede dejar mas de un comentario por día!
						</div>
			<?php
			unset($_POST);
			return;
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
		return number_format($resultado['ranking'], 2);
	}

	public function getRankeo()
	{
		$query = "SELECT AVG(calificacion) AS ranking FROM comentarios INNER JOIN productos ON productos.id = comentarios.productos_id AND comentarios.activo = 1";
		$resultado = $this->con->query($query)->fetch();
		return number_format($resultado['ranking'], 2);
	}

	/* $sql = "INSERT INTO comentarios (email, ranqueo, comentario, fecha, ip, productos_id) 
		VALUES ('email', '5', 'comentario', '2020', '127.0.0.1', '1')"; 
		$this->con->exec($sql);*/

	// ***********************
	//       BACK END
	// ***********************

	/*public function getComent()
	{
		if ($_GET == null || $_GET['orden'] == "") {
			$query = 'SELECT * FROM comentarios';
			return $this->con->query($query);
		} else if ($_GET['orden'] == "1") {
			$query = 'SELECT * FROM comentarios WHERE comentarios.activo = 1';
			return $this->con->query($query);
		} else if ($_GET['orden'] == "2") {
			$query = 'SELECT * FROM comentarios WHERE comentarios.activo = 0';
			return $this->con->query($query);
		}
	}*/
	public function getComent($limit, $pagStart)
	{
		$query = "SELECT * FROM comentarios";

		if (!empty($_GET['orden'])) {
			if ($_GET['orden'] == "1") {
				$query .= ' WHERE comentarios.activo = 1';
			} else {
				$query .= ' WHERE comentarios.activo = 0';
			}
		}

		$query .= " ORDER BY id LIMIT $pagStart, $limit";

		return $this->con->query($query);
	}

	public function getProdName()
	{
		$query = "SELECT productos.nombre AS nombre FROM productos INNER JOIN comentarios ON comentarios.productos_id = productos.id";
		$resultado = $this->con->query($query)->fetch();
		return $resultado['nombre'];
	}

	public function getComentProd($filtro = array())
	{
		if (!empty($filtro['id'])) {
			$productos_id = $filtro['id'];
			$query = "SELECT * FROM comentarios WHERE productos_id = $productos_id";
			return $this->con->query($query);
		}
	}

	public function get($id)
	{
		$query = "SELECT * FROM comentarios WHERE id = " . $id;
		$query = $this->con->query($query);

		$comentarios = $query->fetch(PDO::FETCH_OBJ);

		$sql = "SELECT id FROM comentarios WHERE id = " . $comentarios->id;

		foreach ($this->con->query($sql) as $commit) {
			$comentarios->array[] = $commit['id'];
		}
		return $comentarios;
	}

	public function del($id)
	{
		$query = "SELECT count(1) as cantidad FROM comentarios WHERE id = " . $id;

		$consulta = $this->con->query($query)->fetch();

		$sql = 'SELECT count(1) as campos FROM comentarios_dinamicos_data WHERE comentario_original_id = ' . $id;
		$coment_din = $this->con->query($sql)->fetch();

		if ($coment_din['campos'] != 0) {
			$sql = 'DELETE FROM comentarios_dinamicos_data WHERE comentario_original_id = ' . $id;
			$this->con->exec($sql);
		}

		if ($consulta->cantidad == 0) {
			$query = "DELETE FROM comentarios WHERE id = " . $id;

			$this->con->exec($query);
			return 1;
		}

		return "Comentario eliminado";
	}

	public function edit($id) //, $data
	{

		//$query = "SELECT activo FROM comentarios WHERE id = " . $id;

		//$consulta = $this->con->query($query)->fetch();

		$query = "UPDATE comentarios SET activo = NOT activo WHERE id = " . $id;
		$this->con->exec($query);
		return 1;

		/*if ($consulta['activo'] == 0) {
			$query = "UPDATE comentarios SET activo = 1 WHERE id = " . $id;

			$this->con->exec($query);
			return 1;
		}
		if ($consulta['activo'] == 1) {
			$query = "UPDATE comentarios SET activo = 0 WHERE id = " . $id;

			$this->con->exec($query);
			return 1;
		}
		return "Comentario modificado";*/
	}

	public function getPagination()
	{
		$query = "SELECT count(id) AS id FROM comentarios";

		if (!empty($_GET['orden'])) {
			if ($_GET['orden'] == "1") {
				$query .= ' WHERE comentarios.activo = 1';
			} else {
				$query .= ' WHERE comentarios.activo = 0';
			}
		}

		$resultado = $this->con->query($query)->fetch();
		return $resultado['id'];
	}
}
