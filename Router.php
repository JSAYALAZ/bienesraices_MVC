<?php
//DEPENDIENDO LAS URL QUE SE ENCUENTREN, MANDA A
//LAMAR DIFERENTES FUNCIONES DEPENDIENDO LA CLASE QUE LOS REQUIERA
namespace MVC;

class Router
{

    public array $getRoutes = [];
    public array $postRoutes = [];

    //ALMACENA EN UN ARRAY LAS URL Y QUE HACE CADA UNA
    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }
    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }


    //ES COMO UN CALLBACK QUE CUANDO SE CAMBIA LA RUTA/ SE ACTIVA LA FUNCION
    public function comprobarRutas()
    {
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        //COMPARA SI LA RUTA ENVIA A TRAVES DE GET O POST
        if ($metodo === 'GET') {
            $fn = $this->getRoutes[$urlActual] ?? null;
        }
        else
        {
            $fn = $this->postRoutes[$urlActual] ?? null;
        }


        //MANDA A LLAMAR AL METODO Y EL LUGAR DONDE SE EJECUTA
        if ($fn) {
            call_user_func($fn, $this);
        } else {
            echo "Página No Encontrada o Ruta no válida";
        }
    }

    //MUESTRA LA VISTA GENERAL DEL PROYECTO-RENDERZA LO QUE SE REQUIERA VER
    public function render($view,$datos =[]){
        foreach($datos as $key => $value){
            $$key = $value;
        }
        ob_start();
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();
        

        include_once __DIR__ . "/views/layout.php";
    }
}