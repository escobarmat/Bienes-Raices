<?php

namespace Model;

class Vendedor extends ActiveRecord{
    protected static $tabla = "vendedores";
    protected static $columnasDB = ["id","nombre","apellido", "telefono", "imagen"];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $imagen;

    public function __construct($args =[])
    {
        $this->id = $args["id"] ?? null;
        $this->nombre = $args["nombre"] ?? "";
        $this->apellido = $args["apellido"] ?? "";
        $this->telefono = $args["telefono"] ?? "";
        $this->imagen = $args["imagen"] ?? null;
    }

    public function validar(){

        if(!$this->nombre){
            self::$errores[] = "Debes añadir un Nombre del vendedor";
        }
        
        if(!$this->apellido){
            self::$errores[] = "Debes añadir un apellido del vendedor";
        }

        
        if(!$this->telefono){
            self::$errores[] = "Debes añadir un Teléfono del vendedor";
        }
        if(!$this->imagen && $this->imagen != null){
            self::$errores[]= "La imágen es siempre obligatoria";
        }
        if(!preg_match("/[0-9]{10}/", $this->telefono) or strlen($this->telefono) > 10){
            self::$errores[]= "Formato no Válido";
        }

        return self::$errores;
    }
}