<?php

namespace Model;

class Blog extends ActiveRecord {
    protected static $tabla = "blog";
    protected static $columnasDB = ["id","titulo", "fecha","escrito", "imagen", "descripcion"];

    public $id;
    public $titulo;
    public $fecha;
    public $escrito;
    public $imagen;
    public $descripcion;

    public function __construct($args =[])
    {
        $this->id = $args["id"] ?? null;
        $this->titulo = $args["titulo"] ?? "";
        $this->fecha = $args["fecha"] ?? "";
        $this->escrito = $args["escrito"] ?? "";
        $this->imagen = $args["imagen"] ?? "";
        $this->descripcion = $args["descripcion"] ?? "";
    }

    public function validar(){

        if(!$this->titulo){
            self::$errores[] = "Debes añadir un titulo";
        }
    
        if(!$this->fecha){
            self::$errores[] = "Debes añadir la fecha";
        }
    
        if(!$this->escrito){
            self::$errores[] = "Debes añadir quien ecribio la entrada";
        }
    
        if(strlen($this->descripcion)<50){
            self::$errores[] = "La descripcion es obligatoria y debe contar con 50 caracteres";
        }
    
        if(!$this->imagen){
            self::$errores[]= "La imágen es siempre obligatoria";
        }

        return self::$errores;
    }
    
}