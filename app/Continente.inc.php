<?php

class Continente {

    private $id;
    private $nombre;

    public function __construct($id, $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function obtener_id() {
        return $this->id;
    }

    public function obtener_nombre() {
        return $this->nombre;
    }

}
