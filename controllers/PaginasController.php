<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $router){
        $limite = 3;
        $inicio = true;
        $propiedades = Propiedad::all($limite);
        $router->render('paginas/index', [
            'limite'=>$limite,
            'inicio'=>$inicio,
            'propiedad' => $propiedades
        ]);
    }
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros', [
            
        ]);
    }
    public static function propiedades(Router $router){
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedad' => $propiedades
        ]);
    }
    public static function propiedad_ind(Router $router){
        $id = $_GET['id'];
        $anuncio = Propiedad::find($id);
        $router->render('paginas/propiedad_ind', [
            'anuncio' => $anuncio
        ]);
    }
    public static function blog(Router $router){
        $router->render('paginas/blog', [
            
        ]);
    }
    public static function entrada(Router $router){
        $router->render('paginas/entrada', [
        ]);
    }
    public static function contacto(Router $router){
        $mensaje =null;
        if($_SERVER['REQUEST_METHOD']==='POST'){
            //configuracion para envio
            $respuestas = $_POST['contacto'];
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '462eb7452807d7';
            $mail->Password = '2090c0d9aa0408';
            $mail->SMTPSecure='tls';
        
            //CONFIGURAR  EL REMITENTE
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('josealbertoayalazumba@gmail.com','Jose Ayala');
            $mail->Subject = 'Prueba PHPMAILER';

            //HABILITAR HTML
            $mail->isHTML(true);
            $mail->CharSet='UTF-8';

            //contenido
           
            $contenido ='<html>'; 
            $contenido.='<p> Tiene un nuevo mensaje </p>';
            $contenido.='<p> Nombre: '.$respuestas['nombre'].'</p>';
            // enviar si contacto telefono
            if($respuestas['contacto']=='telefono'){
                $contenido.='<p>Eligio ser contactado por telefono </p>';
                $contenido.='<h3>Telefono: <span>'.$respuestas['telf'].'</span></h3>';
                $contenido.='<p> Fecha ser contactado: '.$respuestas['fecha'].'</p>';
                $contenido.='<p> Hora a ser contactado: '.$respuestas['hora'].'</p>';
            }else{
                $contenido.='<p>Eligio ser contactado por email </p>';
                $contenido.='<p> Email: '.$respuestas['email'].'</p>';
            }
            $contenido.='<p> Mensaje: '.$respuestas['mensaje'].'</p>';
            $contenido.='<p> Vende o compra: '.$respuestas['tipo'].'</p>';
            $contenido.='<p> Precio o presupuesto: $'.$respuestas['presupuesto'].'</p>';
            $contenido.='</html>'; 

        
            $mail->Body = $contenido;
            $mail->AltBody = 'esto es texto alternativo sin html';

            if($mail->send()){
                $mensaje = 'Email enviado correctamente';
            }else{
                $mensaje = "Email no se pudo envia";
            }
            
        }
        $router->render('paginas/contacto', [
            'mensaje'=>$mensaje
        ]);
    }
}