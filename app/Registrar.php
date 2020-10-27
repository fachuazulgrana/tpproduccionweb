<?php

class Registrar
{

    private $con;

    function __construct($con)
    {
        $this->con = $con;
    }

    public function setRegistrar()
    {
        if (isset($_POST['CrearCuenta'])) {
            $email = $_POST['email_registro'];
            $usuario = $_POST['usuario'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            $query_email = "SELECT * FROM clientes WHERE clientes.email = '$email'";
            $query_usuario = "SELECT * FROM clientes WHERE clientes.user = '$usuario'";
            $res_email = $this->con->query($query_email);
            $num_rows_email = $res_email->rowCount();
            $res_usuario = $this->con->query($query_usuario);
            $num_rows_usuario = $res_usuario->rowCount();

            if ($password1 != $password2) {
?>
                </div>
                <div class="col-sm-12 col-md-12 py-2">
                    <div class='alert alert-danger' role='alert'>
                        Las contraseñas no coinciden.
                    </div>
                <?php
            }
            if ($num_rows_email != 0) {
                ?>
                </div>
                <div class="col-sm-12 col-md-12 py-2">
                    <div class='alert alert-danger' role='alert'>
                        Este email ya esta en uso, por favor utilice otro.
                    </div>
                <?php
            }

            if ($num_rows_usuario != 0) {
                ?>
                </div>
                <div class="col-sm-12 col-md-12 py-2">
                    <div class='alert alert-danger' role='alert'>
                        Este usuario ya esta en uso, por favor utilice otro.
                    </div>
                <?php
            }

            if ($num_rows_usuario == 0 && $num_rows_email == 0 && $password1 == $password2) {
                $nombre = $_POST['nombre_registro'];
                $apellido = $_POST['apellido_registro'];
                $salt = [
                    'cost' => 12,
                    'salt' => "sdgsfgsdfksjfjs5245fdsfsdfjks"
                ];
                $password = password_hash($password1, PASSWORD_DEFAULT, $salt);
                $sql = "INSERT INTO clientes (`nombre`, `apellido`, `email`, `user`, `password`, `activo`) VALUES ('$nombre', '$apellido', '$email', '$usuario','$password', 0)";
                $this->con->exec($sql);
                ?>
                </div>
                <div class="col-sm-12 col-md-12 py-2">
                    <div class='alert alert-success'>
                        Gracias por registrarse! Su usuario será validado a la brevedad.
                    </div>
    <?php
            }
        }
    }
}