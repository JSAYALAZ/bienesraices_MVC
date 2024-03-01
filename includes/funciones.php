<?php

define('TEMPLATES_URL', __DIR__ . '/templates/');
define('FUNCTIONES_URL', __DIR__ . '/funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'].'/imagenes/');


function incluirTemplate($nombre, $inicio = false, int $limite=null){
    include TEMPLATES_URL . "/$nombre.php";
}
function incluirDB(): mysqli{
    $db = new mysqli('localhost', 'root', 'root', 'bienesraices_crud');
    if (!$db) {
        echo "Error no se pudo conectar";
        exit;
    }
    return $db;
}
function autentificated(){
    session_start();
    if (!$_SESSION['login']) {
        header("Location: /bienesraices_inicio/login.php");
      }
}
function debuguear($objeto){
    echo '<pre>';
    var_dump($objeto);
    echo '</pre>';
    exit;
}
function s($html){
    // Devuelve el texto sin html
    $s = htmlspecialchars($html);
    return $s;
}
function comprobarId_GET($id){
    $id_inicio = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if (!$id_inicio) {
      header('Location: ../index.php?mensaje=errorAct');
    }return $id_inicio;
}
function validarTipo($tipo){
    $tipos = ['vendedor','propiedad'];
    return in_array($tipo,$tipos);
}
function muestraMensaje($codigo){
    $mensaje ='';
    switch($codigo){
        case 1:
            $mensaje='Registrado correctamente';
            break;
        case 2:
            $mensaje='Actualizado correctamente';
            break;
        case 'errorAct':
            $mensaje='Algo fallo en actualizacion';
            break;
        case 3:
            $mensaje='Eliminado Correctamente<';
            break;
        case 4:
            $mensaje='Creado vendedor correctamente';
            break;
        case 5:
            $mensaje='Crear vendedor fallo';
            break;
        case 6:
            $mensaje='Actualizado vendedor correctamente';
            break;
        case 7:
            $mensaje='Actualizado vendedor fallo';
            break;
        case 8:
            $mensaje='Actualizado vendedor fallo';
            break;
        default:
            $mensaje='';
            break;
    }
    return $mensaje;
}
function validarORedireccionar(string $url){
    $id = $_GET['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);
      if(!$id){
        header("Location: $url");
      }
      return $id;
}