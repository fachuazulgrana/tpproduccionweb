<?php

class Pais {

    private $id;
    private $nombre;
    private $continente_id;

    public function __construct($id, $nombre, $continente_id) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->continente_id = $continente_id;

    }

    public function obtener_id() {
        return $this->id;
    }

    public function obtener_nombre() {
        return $this->nombre;
    }

    public function obtener_continente_id() {
        return $this->continente_id;
    }

}
