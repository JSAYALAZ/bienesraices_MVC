<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

//variables globales

class PropiedadController{

  //MUESTRA PAGINA PRINCIPAL
  public static function index(Router $router){

    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();

    $_GET['mensaje']?$resultado = $_GET['mensaje']:$resultado=null;


    //LLAMA AL VIEW (VIEW, PROPIEDADES)
    $router->render('propiedades/admin', [
      'propiedades' => $propiedades,
      'resultado' => $resultado,
      'vendedores'=>$vendedores,
    ]);
  }


  //CREA NUEVAS PROPIEDADES
  public static function crear(Router $router){
    $propiedad = new Propiedad;
    $vendedores = Vendedor::all();
    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //CUANDO EN EL FORMULARIO SE PULSAR EL BOTON DE SUBMIT
      $args = $_POST['propiedad'];
      $propiedad = new Propiedad($args);
      $nombreUnico = md5(uniqid(rand(), true)) . '.jpg';

      if ($_FILES['propiedad']['tmp_name']['imagen']) {
        move_uploaded_file($_FILES['propiedad']['tmp_name']['imagen'], CARPETA_IMAGENES . $nombreUnico);
        $propiedad->setImagen($nombreUnico);
      }
      $errores = $propiedad->validar();
      if (empty($errores)) {
        if (!is_dir(CARPETA_IMAGENES)) {
          mkdir(CARPETA_IMAGENES);
        }
        $rs_propiedad = $propiedad->insert();
        if ($rs_propiedad) {
          header('Location: /admin?mensaje=1');
        }
      }

    }

    //LLAMA AL VIEW (VIEW, PROPIEDADES)
    $router->render('propiedades/crear', [
      'propiedad' => $propiedad,
      'vendedores' => $vendedores,
      'errores' => $errores
    ]);
  }


  //ACTUALIZA LAS PROPIEDADES
  public static function actualizar(Router $router){
    $id = validarORedireccionar('/admin');
    $propiedad = Propiedad::find($id);
    $vendedores = Vendedor::all();
    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $args = $_POST['propiedad'];
      $propiedad->sincronizar($args);
      $errores = $propiedad->validar();
      $nombreUnico = md5(uniqid(rand(), true)) . '.jpg';
      if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $propiedad->setImagen($nombreUnico);
      }
      if (empty($errores)) {
        if ($_FILES['propiedad']['tmp_name']['imagen']) {
          move_uploaded_file($_FILES['propiedad']['tmp_name']['imagen'], CARPETA_IMAGENES . $nombreUnico);
        }
        $result_actl = $propiedad->insert();

        if ($result_actl) {
          header('Location: /admin?mensaje=2');
        } else {
          header('Location: /admin?mensaje=errorAct');
        }
      }
    }

    $router->render('propiedades/crear', [
      'propiedad' => $propiedad,
      'vendedores' => $vendedores,
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
          $propiedad = Propiedad::find($id);
          $result_delet = $propiedad->eliminar();
          if ($result_delet) {
            $propiedad->borrarImagen();
            header('Location: /admin?mensaje=3');
          }
        }

      }
    }
  }
}