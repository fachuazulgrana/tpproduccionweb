<?php

class IniciarSesion
{

    private $con;

    function __construct($con)
    {
        $this->con = $con;
    }

    public function inciarSesion($data)
    {
        $usuario = $data['usuario'];
        $password = $data['password1'];

        $sql = "SELECT `id_usuario`,`nombre`,`apellido`,`email`,`user`,`password`,`activo`
                   FROM `clientes` WHERE `activo` = 1 AND `user` = '$usuario'";
        $datos = $this->con->query($sql)->fetch(PDO::FETCH_ASSOC);
        if (isset($datos['id_usuario'])) {

            $query = "SELECT `password` FROM `clientes` WHERE `id_usuario` = " . $datos['id_usuario'];
            $pass = $this->con->query($query)->fetch(PDO::FETCH_ASSOC);
            $passw = $pass['password'];

            if (password_verify($password, $passw)) {
                unset($datos['pasword']);
                $_SESSION['cliente'] = $datos;
                return 1;
            } else {
?>
                </div>
                <div class="col-sm-12 col-md-12 py-2">
                    <div class='alert alert-danger'>
                        Credenciales incorrectas.
                    </div>
                <?php
                return 0;
            }
                ?>
                </div>
                <div class="col-sm-12 col-md-12 py-2">
                    <div class='alert alert-danger'>
                        Credenciales incorrectas.
                    </div>
                <?php
                return 0;
            }
                ?>
                </div>
                <div class="col-sm-12 col-md-12 py-2">
                    <div class='alert alert-danger'>
                        Credenciales incorrectas.
                    </div>
            <?php
            return 0;
        }
    }

            ?>