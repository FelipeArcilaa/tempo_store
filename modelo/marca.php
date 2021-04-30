<?php

class marca {

    private $mar_id;
    private $mar_nombre;

    function __construct() {}

    function setMarId($mar_id){
        $this->mar_id = $mar_id;
    }

    function setMarNombre($mar_nombre){
        $this->mar_nombre = $mar_nombre;
    }

    function getMarId(){
        return $this->mar_id;
    }

    function getMarNombre(){
        return $this->mar_nombre;
    }
}