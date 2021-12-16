<?php

namespace Controllers;

use Model\Blog;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index( Router $router){
        $blogs = Blog::get(3);
        $propiedades = Propiedad::get(3);
        $inicio = true;
        $router->render("paginas/index",[
            "propiedades" => $propiedades,
            "inicio" => $inicio,
            "blogs" => $blogs
        ]);
    }
    public static function nosotros(Router $router){
        
        $router->render("paginas/nosotros");
    }
    public static function propiedades(Router $router){
        $propiedades = Propiedad::all();

        $router->render("paginas/propiedades", [
            "propiedades" => $propiedades
        ]);
    }
    public static function propiedad( Router $router){

        $id = validarORedireccionar("/propiedades");

        //Buscar propiedad por id
        $propiedad = Propiedad::find($id);

        $router->render("paginas/propiedad", [
            "propiedad"=> $propiedad
        ]);
    }
    public static function blog( Router $router){

        $blogs = Blog::all();

        $router->render("paginas/blog", [
            "blogs" => $blogs
        ]);
    }
    public static function entrada(Router $router){

        $id = validarORedireccionar("/blog");
        $blog = Blog::find($id);
        
        $router->render("paginas/entrada", [
            "blog" => $blog
        ]);
    }
    public static function contacto( Router $router){

        $mensaje = null;

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $respuestas = $_POST["contacto"];
            
            //Crear una instancia de PHPmailer
            $mail = new PHPMailer();

            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '66ad10c3c13d29';
            $mail->Password = 'c9ea044a73779c';
            $mail->SMTPSecure = "tls";
            
            //Configurar el contenido del mail
            $mail->setFrom("admin@bienesraices.com");
            $mail->addAddress("admin@bienesraices.com", "BienesRaices.com");
            $mail->Subject = "Tienes Un Nuevo Mensaje";

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";

            //Definir el contenido
            $contenido = "<html>";
            $contenido .= "<p>Tienes un nuevo mensaje</p>";
            $contenido .= "<p>Nombre: " . $respuestas["nombre"] . "</p>";
            //Enviar de forma consdicional algunos campos de email o telefono
            if($respuestas["contacto"] === "telefono"){
                $contenido .= "<p> Eligió ser contactado por teléfono: </p>";
                $contenido .= "<p>Teléfono: " . $respuestas["telefono"] . "</p>";
                $contenido .= "<p>Fecha de contacto: " . $respuestas["fecha"] . "</p>";            
                $contenido .= "<p>Hora: " . $respuestas["hora"] . "</p>";  

            }else{
                // es email, entonces agregamos el campo de email
                $contenido .= "<p> Eligió ser contactado por email: </p>";
                $contenido .= "<p>Email: " . $respuestas["email"] . "</p>";
            }
            
            $contenido .= "<p>Mensaje: " . $respuestas["mensaje"] . "</p>";
            $contenido .= "<p>Vende o Compra: " . $respuestas["tipo"] . "</p>";            
            $contenido .= "<p>Precio o presupuesto: $" . $respuestas["precio"] . "</p>";            
            $contenido .= "</html>";

            $mail->Body = $contenido;
            $mail->AltBody = "Esto es texto alternativo sin HTML";

            //Enviar el email
            if($mail->send()){
                $mensaje = "Mensaje enviado Correctamente";
            }else{
                $mensaje = "El mensaje no se pudo enviar...";
            }
        }
        
        $router->render("paginas/contacto", [
            "mensaje" => $mensaje
        ]);
    }
}
