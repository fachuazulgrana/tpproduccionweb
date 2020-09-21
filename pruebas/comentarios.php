<?php

class Comentarios
{

	private $con;

	function __construct($con)
	{
		$this->con = $con;
	}

	public function getComentarios()
	{
		$query = "SELECT * FROM comentarios ORDER BY id DESC";
		return $this->con->query($query);
	}

	public function setComentarios()
	{
		if (isset($_POST['comentar'])) {
			if (strlen($_POST['nombre']) >= 1 && strlen($_POST['email']) >= 1) {
			$name = $_POST['nombre'];
			$email = $_POST['email'];
			$calificacion = $_POST['estrellas'];
			$comentario = $_POST['comentario'];
			$fechareg = date("d/m/y");
			/* $data['fecha'] = date('d/m/Y H:i:s');
			$fecha = new DateTime(); */
			$ip = "100.100.100";
			$producto_id = $_POST['productos_id'];
			$sql = "INSERT INTO comentarios (`nombre`, `email`, `calificacion`, `comentario`, `fecha`, `ip`, `productos_id`) VALUES ('$name', '$email', '$calificacion', '$comentario','$fechareg','$ip','$producto_id')";
			$this->con->exec($sql);
			/* $statement = $this->con->prepare($sql);
			$inserted = $statement->execute(); */
			}
		}
	}

	public function getRanqueo()
	{
		//ESTE ES EL RANQUEO QUE DEBERÍA FUNCIONAR PERO DICE QUE HAY UN ERROR CUANDO USO EL ECHO
		//ESTO SOLO FUNCIONARÍA BIEN EN product_details.php NO EN card_paises.php HAY QUE PENSAR COMO AGREGARLO ALLÁ
		$query = "SELECT AVG(calificacion) FROM comentarios WHERE productos_id =" .$_GET['id'];
		return $this->con->query($query);
	}

	/* $sql = "INSERT INTO comentarios (email, ranqueo, comentario, fecha, ip, productos_id) 
		VALUES ('email', '5', 'comentario', '2020', '127.0.0.1', '1')"; 
		$this->con->exec($sql);*/
}

?>