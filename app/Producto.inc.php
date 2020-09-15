<?php

class Producto {

    private $id;
    private $ciudad;
    private $descripcion;
    private $paises_id;
    private $continente_id;
    private $precio;
    private $activo;
    private $destacado;

    public function __construct($id, $ciudad, $descripcion, $paises_id, $continente_id, $precio, $activo, $destacado) {
        $this->id = $id;
        $this->ciudad = $ciudad;
        $this->descripcion = $descripcion;
        $this->paises_id = $paises_id;
        $this->continente_id = $continente_id;
        $this->precio = $precio;
        $this->activo = $activo;
        $this->destacado = $destacado;
    }

    public function obtener_id() {
        return $this->id;
    }

    public function obtener_ciudad() {
        return $this->ciudad;
    }

    public function obtener_descripcion() {
        return $this->descripcion;
    }

    public function obtener_paises_id() {
        return $this->paises_id;
    }

    public function obtener_continente_id() {
        return $this->continente_id;
    }

    public function obtener_precio() {
        return $this->precio;
    }

    public function obtener_activo() {
        return $this->activo;
    }

    public function obtener_destacado() {
        return $this->destacado;
    }


}
