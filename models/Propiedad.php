<?php

namespace Model;

class Propiedad extends ActiveRecord{

    protected static $tabla ='propiedades';
    protected static $columnas = ['id','titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];

    private $id;
    private $titulo;
    private $precio;
    private $imagen;
    private $descripcion;
    private $habitaciones;
    private $wc;
    private $estacionamiento;
    private $creado;
    private $vendedores_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->creado = date('Y-m-d');
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->vendedores_id = $args['vendedores_id'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
    }
    public function validar(): array{
        !$this->titulo ? self::$errores[] = 'Falta titulo' : '';
        !$this->precio ? self::$errores[] = 'Falta Precio' : '';
        !$this->habitaciones ? self::$errores[] = 'Falta # habitaciones' : '';
        !$this->wc ? self::$errores[] = 'Falta # wc' : '';
        !$this->estacionamiento ? self::$errores[] = 'Falta # estacionamiento' : '';
        !$this->vendedores_id ? self::$errores[] = 'Falta id del V' : '';
        !$this->imagen ? self::$errores[] = 'Falta una imagen' : '';
        if (!$this->descripcion) {
            self::$errores[] = 'Debes añadir una descripcion';
        }
        return self::$errores;
    }
    

    public function setAll($key, $value){
        $this->$key = $value;
    }
    public function getAll($key){
        return $this->$key;
    }


    public function getTitulo(){
        return $this->titulo;
    }
    public function getId(){
        return $this->id;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getHabitaciones(){
        return $this->habitaciones;
    }

    public function getWc(){
        return $this->wc;
    }
  
    public function getEstacionamiento(){
        return $this->estacionamiento;
    }
  
    public function getVendedores_id(){
        return $this->vendedores_id;
    }
 
    public function getImagen(){
        return $this->imagen;
    }
}