<?php

namespace Model;

class Admin extends ActiveRecord{
    //Base de datos
    protected static $tabla = "usuarios";
    protected static $columnasDB = ["id", "email", "password"];

    public $id;
    public $email;
    public $password;

    public function __construc($args = []){
        $this->id = $args["id"] ?? null;
        $this->email = $args["email"] ?? "";
        $this->password = $args["password"] ?? "";
    }

    public function validar(){
        if(!$this->email){
            self::$errores[] = "El email es Obligatorio";
        }
        if(!$this->password){
            self::$errores[] = "La Contraseña es obligatoria";
        }
        return self::$errores;
    }
    public function  
}
