<?php

class Usuario
{

    private $con;


    function __construct($con)
    {
        $this->con = $con;
    }

    public function getUsuarios()
    {
        $query = 'SELECT * FROM usuarios';
        $resultado = array();
        foreach ($this->con->query($query) as $key => $usuario) {
            $resultado[$key] = $usuario;
            $sql = 'SELECT nombre 
            FROM perfiles 
            INNER JOIN usuario_perfiles ON (usuario_perfiles.perfil_id = perfiles.id_perfil)
            WHERE usuario_perfiles.usuario_id = ' . $usuario['id_usuario'];
            foreach ($this->con->query($sql) as $perfil) {
                $resultado[$key]['perfiles'][] = $perfil['nombre'];
            }
        }
        return $resultado;
    }



    public function get($id)
    {
        $query = "SELECT `id_usuario`,`nombre`, `apellido`, `email`, `usuario`,`clave` FROM `usuarios` WHERE `id_usuario` =" . $id;
        $query = $this->con->query($query);
        $usuario = $query->fetch(PDO::FETCH_OBJ);


        return $usuario;
    }

    public function del($id)
    {
        /*         $query = "SELECT count(1) as cantidad FROM usuario_perfiles WHERE usuario_id = " . $id;
        $consulta = $this->con->query($query)->fetch(PDO::FETCH_OBJ);
        if ($consulta->cantidad != 0) {
            $query = "DELETE FROM usuario_perfiles WHERE usuario_id = " . $id . ";
        DELETE FROM usuarios WHERE id_usuario = " . $id . ";";
            $this->con->exec($query);
            return 1;
        } else {
            $query = "DELETE FROM usuarios WHERE id_usuario = " . $id;
            $this->con->exec($query);
            return "Usuario Eliminado";
        } */

        $query = "UPDATE `usuarios` SET `activo` = '0' WHERE `usuarios`.`id_usuario` = '$id'";
        $this->con->exec($query);
        return 1;
    }

    public function edit($data)
    {
        $id = $data['id_usuario'];
        $password_old = $data['password_old'];
        $password1 = $data['clave1'];
        $password2 = $data['clave2'];
        unset($data['id_usuario']);

        $query = "SELECT `clave` FROM `usuarios` WHERE `id_usuario` = " . $id;
        $pass = $this->con->query($query)->fetch(PDO::FETCH_ASSOC);
        $passw = $pass['clave'];

        if (!(password_verify($password_old, $passw))) {
            return "La antigua contraseña es incorrecta";
        }
        if ($password1 != $password2) {
            return "Las contraseñas no coinciden.";
        }

        if ((password_verify($password_old, $passw)) && $password1 == $password2) {

            $salt = [
                'cost' => 12,
                'salt' => "sdgsfgsdfksjfjs5245fdsfsdfjks"
            ];
            $password = password_hash($password1, PASSWORD_DEFAULT, $salt);

            $sql = "UPDATE usuarios SET `clave` = '$password' WHERE `id_usuario` = '$id'";

            $this->con->exec($sql);
            return 1;
        }
    }

    public function save($data)
    {
        $usuario = $data['usuario'];
        $email = $data['email'];
        $clave1 = $data['clave1'];
        $clave2 = $data['clave2'];

        //Checkeo si el usuario existe
        $query_usuario = "SELECT * FROM usuarios WHERE usuarios.usuario = '$usuario'";
        $res_usuario = $this->con->query($query_usuario);
        $num_rows_usuario = $res_usuario->rowCount();

        if ($num_rows_usuario != 0) {
            return "Este usuario ya esta en uso, por favor utilice otro";
        }

        //Checkeo si el email existe
        $query_email = "SELECT * FROM usuarios WHERE usuarios.email = '$email'";
        $res_email = $this->con->query($query_email);
        $num_rows_email = $res_email->rowCount();

        if ($num_rows_email != 0) {
            return "Este email ya esta en uso, por favor utilice otro";
        }

        //Checkeo que las dos contraseñas son iguales
        if ($clave1 != $clave2) {
            return "Las contraseñas no coinciden";
        }

        //Si todo es OK.. Guardo el nuevo usuario
        if ($num_rows_email == 0 && $num_rows_usuario == 0 && $clave1 == $clave2) {
            $nombre = $data['nombre'];
            $apellido = $data['apellido'];

            $salt = [
                'cost' => 12,
                'salt' => "sdgsfgsdfksjfjs5245fdsfsdfjks"
            ];
            $password = password_hash($clave1, PASSWORD_DEFAULT, $salt);

            $sql = "INSERT INTO `usuarios`(`nombre`, `apellido`, `email`, `usuario`, `clave`, `activo`) VALUES ('$nombre', '$apellido', '$email', '$usuario', '$password', 1)";
            $this->con->exec($sql);

            $id_usuario = $this->con->lastInsertId();
            $sql = '';
            foreach ($data['perfil'] as $perfil) {
                $sql .= 'INSERT INTO usuario_perfiles(usuario_id,perfil_id) 
							VALUES (' . $id_usuario . ',' . $perfil . ');';
            }
            $this->con->exec($sql);
            return 1;
        }
    }

    public function login($data)
    {
        $usuario = $data['usuario'];
        $password = $data['clave'];

        $sql = "SELECT id_usuario,nombre,apellido,email,usuario,clave,activo
               FROM usuarios WHERE activo = 1 AND usuario = '$usuario'";
        $datos = $this->con->query($sql)->fetch(PDO::FETCH_ASSOC);
        if (isset($datos['id_usuario'])) {

            $query = "SELECT `clave` FROM `usuarios` WHERE `id_usuario` = " . $data['id_usuario'];
            $pass = $this->con->query($query)->fetch(PDO::FETCH_ASSOC);
            $passw = $pass['clave'];

            if (!(password_verify($password, $passw))) {
                return "Credenciales incorrectas";
            } else {
                $_SESSION['usuario'] = $datos;
                $query = "SELECT code, seccion FROM permisos
                          INNER JOIN perfil_permiso ON (perfil_permiso.permiso_id = permisos.id)
                          INNER JOIN usuario_perfiles ON (usuario_perfiles.perfil_id = perfil_permiso.perfil_id)
                          WHERE usuario_id = " . $datos['id_usuario'];
                $permisos = array();
                foreach ($this->con->query($query) as $key => $value) {
                    $permisos['code'][$key] = $value['code'];
                    $permisos['seccion'][$key] = $value['seccion'];
                }

                $_SESSION['usuario']['permisos'] = $permisos;
            }
            return "Credenciales incorrectas";
        }
    }

    public function notLogged()
    {
        if (!isset($_SESSION['usuario'])) {
            return true;
        }
        return false;
    }
}
