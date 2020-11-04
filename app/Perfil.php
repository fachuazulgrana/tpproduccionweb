<?php

class Perfil
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function getList()
    {
        $query = 'SELECT * FROM perfiles';
        return $this->con->query($query);
    }

    public function get($id)
    {
        $query = "SELECT id_perfil, nombre FROM perfiles WHERE id_perfil = " . $id;
        $query = $this->con->query($query);
        $perfil = $query->fetch(PDO::FETCH_OBJ);

        $sql = "SELECT perfil_id, permiso_id FROM perfil_permiso WHERE perfil_id = " . $perfil->id_perfil;

        foreach ($this->con->query($sql) as $permiso) {
            $perfil->permisos[] = $permiso['permiso_id'];
        }
        return $perfil;
    }

    public function del($id)
    {
        $query = "SELECT count(1) as cantidad FROM usuario_perfiles WHERE perfil_id = " . $id;

        $consulta = $this->con->query($query)->fetch(PDO::FETCH_OBJ);

        if ($consulta->cantidad == 0) {
            $query = "DELETE FROM perfil_permiso WHERE perfil_id = " . $id . ";
            DELETE FROM perfiles WHERE id_perfil = " . $id . ";";

            $this->con->exec($query);
            return 1;
        }

        return "Perfil asignado a un usuario";
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
        $sql = "INSERT INTO perfiles(" . implode(',', $columns) . ") VALUES('" . implode("','", $datos) . "')";
        $this->con->exec($sql);

        $id = $this->con->lastInsertId();

        $sql = '';

        foreach ($data['permisos'] as $permisos) {
            $sql .= 'INSERT INTO perfil_permiso(perfil_id, permiso_id) VALUES (' . $id . ',' . $permisos . ');';
        }
        $this->con->exec($sql);
    }

    public function edit($data)
    {
        $id = $data['id_perfil'];
        unset($data['id_perfil']);

        foreach ($data as $key => $value) {
            if (!is_array($value)) {
                if ($value != null) {
                    $columns[]=$key." = '".$value."'";
                }
            }
        }

        $sql = "UPDATE perfiles SET " .implode(',', $columns)." WHERE id_perfiles = " .$id;

        $this->con->exec($sql);

        $sql = 'DELETE FROM perfil_permiso WHERE perfil_id = ' .$id;
        $this->con->exec($sql);

        $sql = '';

        foreach ($data['permisos'] as $permisos) {
            $sql .= 'INSERT INTO perfil_permiso(perfil_id, permiso_id) VALUES (' . $id . ',' . $permisos . ');';
        }
        $this->con->exec($sql);
    }
}
