<?php

class producto {
    private $pro_id;
    private $pro_nombre;
    private $pro_descripciom;
    private $pro_unidades;
    private $pro_precio;
    private $mar_id;
    private $marca;
    
    function __construct() {
        
    }

    function setProId($pro_id) {
        $this->pro_id = $pro_id;
    }

    function setProNombre($pro_nombre) {
        $this->pro_nombre = $pro_nombre;
    }

    function setProDescripcion($pro_descripcion) {
        $this->pro_descripcion = $pro_descripcion;
    }

    function setProUnidades($pro_unidades) {
        $this->pro_unidades = $pro_unidades;
    }

    function setProPrecio($pro_precio) {
        $this->pro_precio = $pro_precio;
    }

    function setProMarcaId($mar_id) {
        $this->mar_id = $mar_id;
    }

    function setMarca($marca){
        $this->marca = $marca;
    }

    function getProId() {
        return $this->pro_id;
    }

    function getProNombre() {
        return $this->pro_nombre;
    }

    function getProDescripcion() {
        return $this->pro_descripcion;
    }

    function getProUnidades() {
        return $this->pro_unidades;
    }

    function getProPrecio() {
        return $this->pro_precio;
    }

    function getProMarcaId() {
        return $this->mar_id;
    }

    function getMarca() {
        return $this->marca;
    }
}