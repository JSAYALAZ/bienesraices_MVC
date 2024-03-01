<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;


class VendedorController{
  //CREA NUEVAS PROPIEDADES
  public static function crear(Router $router){
    $vendedor = new Vendedor;
    $errores = Vendedor::getErrores();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //CUANDO EN EL FORMULARIO SE PULSAR EL BOTON DE SUBMIT
      $args = $_POST['vendedor'];
      $vendedor = new Vendedor($args);
      $nombreUnico = md5(uniqid(rand(), true)) . '.jpg';
      $errores = $vendedor->validar();
      if (empty($errores)) {
        $rs_vendedor = $vendedor->crear();
        if ($rs_vendedor) {
          header('Location: /admin?mensaje=4');
        }else{
          header('Location: /admin?mensaje=5');
        }
      }

    }

    //LLAMA AL VIEW (VIEW, PROPIEDADES)
    $router->render('vendedores/crear', [
      'vendedor' => $vendedor,
      'errores' => $errores
    ]);
  }

  //ACTUALIZA LAS PROPIEDADES
  public static function actualizar(Router $router){
    $id = validarORedireccionar('/admin');
    $vendedor = Vendedor::find($id);
    $errores = [];

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $args=$_POST['vendedor'];
        $vendedor->sincronizar($args);
        $errores=$vendedor->validar();
        if(empty($errores)){
            $result_actl = $vendedor->actualizar();
            if ($result_actl) {
              header('Location: /admin?mensaje=6');// CREAR VENDEDOR BIEN
              } else {
                header('Location: /admin?mensaje=7');//ERROR CREAR VENDEDOR
              }
        }
    }

    $router->render('vendedores/actualizar', [
      'vendedor' => $vendedor,
      'errores' => $errores
    ]);
  }

  //ELIMINA UNA PROPIEDAD
  public static function eliminar(Router $router){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
      if ($id) {
        $tipo = $_POST['tipo'];
        if (validarTipo($tipo)) {
          $vendedor = Vendedor::find($id);
          $result_delet = $vendedor->eliminar();
          if ($result_delet) {
            header('Location: /admin?mensaje=8');
          }
        }

      }
    }
  }
}