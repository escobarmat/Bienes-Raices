<?php

namespace Controllers;

use Model\Blog;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController{
    public static function crear(Router $router){

        $blog = new Blog;
        
        $errores = Blog::getErrores();

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $blog = new Blog($_POST["blog"]);

            /**SUBIDA DE ARCHIVOS */

            //Generar nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //Setear la imagen
            //Realiza un resize a la imagen con intervention image
            if($_FILES["blog"]["tmp_name"]["imagen"]){
                $image = Image::make($_FILES["blog"]["tmp_name"]["imagen"])->fit(800,600);
                $blog->setImagen($nombreImagen);
            }

            //Validar
            $errores = $blog->validar();


            //Revisar que el arreglo de errores este vacio
            if(empty($errores)){
                //Crear la carpeta para subir Imagenes
                //Crear carpeta
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }


                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES. $nombreImagen);

                //Guarda en la base de datos
                $blog->guardar();
            }
        }

        $router->render("blog/crear", [
            "errores" => $errores,
            "blog"=> $blog

        ]);
    }
    public static function actualizar(Router $router){
        
        $id = validarORedireccionar("/admin");
        $blog = Blog::find($id);
        $errores = Blog::getErrores();

        //Metodo POST para actualizar
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            //Asignar los atributos
            $args = $_POST["blog"];
        
            $blog->sincronizar($args);
            
            //Validacion
            $errores = $blog->validar();
        
            //Subida de Archivos
            //Generar nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            if($_FILES["blog"]["tmp_name"]["imagen"]){
                $image = Image::make($_FILES["blog"]["tmp_name"]["imagen"])->fit(800,600);
                $blog->setImagen($nombreImagen);
            }
            
            //Revisar que el arreglo de errores este vacio
            if(empty($errores)){
                if($_FILES["blog"]["tmp_name"]["imagen"]){
                    //Almacenar la imagen
                    $image->save(CARPETA_IMAGENES. $nombreImagen);
                }
                $blog->guardar();
            }
        }

        $router->render("blog/actualizar",[
            "blog" => $blog,
            "errores" => $errores
        ]);  
    }
    public static function eliminar(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){

            //Validar id
            $id = $_POST["id"];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            if($id){        
                $tipo = $_POST["tipo"];
                if(validarTipoContenido($tipo)){
                    $blog = Blog::find($id);
                    $blog->eliminar(); 
                }else{
                    header("location: /admin");
                }   
            }
        }
    }
}