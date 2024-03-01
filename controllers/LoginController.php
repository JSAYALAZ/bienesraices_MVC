<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{
    public static function login (Router $router){
        $errores=[];
        
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $auth = new Admin($_POST);
            $errores=$auth->validar();

            if(empty($errores)){

                //VERIFICAR SI EXISTE EL USUARIO
                $resultado = $auth->existeUsuario();
                if(!$resultado){
                    $errores=Admin::getErrores();
                }else{
                    $autenticado = $auth->comprobarPasswd($resultado);
                    if($autenticado){
                        $auth->redireccionar();
                    }else{
                        $errores=Admin::getErrores();
                    }
                }
            }
        }
        $router -> render('Auth/login',[
            'errores'=>$errores
        ]);
    }
    public static function logout (Router $router){
        session_start();
        $_SESSION=[];
        header('Location /login');
    }
}