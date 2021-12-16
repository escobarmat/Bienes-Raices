<?php

namespace Controllers;
use MVC\Router;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;


class VendedorController{
    public static function index(Router $router){

        $vendedores = Vendedor::all();

        $router->render("/vendedores/admin",[
            "vendedores" => $vendedores      
        ]);
    }
    public static function crear(Router $router){

        $vendedor = new Vendedor;

        //Arreglo con mensaje de errores
        $errores = Vendedor::getErrores();

        if($_SERVER["REQUEST_METHOD"] === "POST"){

            //Crear una nueva instancia
            $vendedor = new Vendedor($_POST["vendedor"]);

        
            /**SUBIDA DE ARCHIVOS */
            //Generar nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        
            //Setear la imagen
            //Realiza un resize a la imagen con intervention image
            if($_FILES["vendedor"]["tmp_name"]["imagen"]){
                $image = Image::make($_FILES["vendedor"]["tmp_name"]["imagen"])->fit(400,300);
                $vendedor->setImagen($nombreImagen);
            }
        
            //Validar que no haya campos vacios
            $errores = $vendedor->validar();
        
            //No hay errores
            if(empty($errores)){
                //Crear la carpeta para subir Imagenes
                //Crear carpeta
                if(!is_dir(IMAGENES_VENDEDORES)){
                    mkdir(IMAGENES_VENDEDORES);
                }
        
        
                //Guarda la imagen en el servidor
                $image->save(IMAGENES_VENDEDORES. $nombreImagen);
        
                $vendedor->guardar();
            }
        }

        $router->render("vendedores/crear",[
            "vendedor" => $vendedor,
            "errores" => $errores
        ]);
    }
    public static function actualizar(Router $router){
        
        $id = validarORedireccionar("/admin");
        
        $vendedor = Vendedor::find($id);

        $errores = Vendedor::getErrores();

        //Ejecutar el codigo despues de que el usuario envia el formulario
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            
            //Asignar los valores
            $args = $_POST["vendedor"];

            //Sincronizar Objeto en memoria con lo que el usuario escribio
            $vendedor->sincronizar($args);

            //Validacion
            $errores = $vendedor->validar();

            //Subida de Archivos
            //Generar nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            if($_FILES["vendedor"]["tmp_name"]["imagen"]){
                $image = Image::make($_FILES["vendedor"]["tmp_name"]["imagen"])->fit(400,300);
                $vendedor->setImagen($nombreImagen);
            }

            if(empty($errores)){
                if($_FILES["vendedor"]["tmp_name"]["imagen"]){
                    //Almacenar la imagen
                    $image->save(IMAGENES_VENDEDORES. $nombreImagen);
                }
                $vendedor->guardar();
            }
        }
        
        $router-> render("/vendedores/actualizar", [
            "vendedor" => $vendedor,
            "errores"=> $errores   
        ]);
    }

    public static function eliminar( ){
        if($_SERVER["REQUEST_METHOD"] === "POST"){

            //Validar id
            $id = $_POST["id"];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            if($id){        
                $tipo = $_POST["tipo"];
                if(validarTipoContenido($tipo)){
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar(); 
                }   
            }
        }        
    }
}