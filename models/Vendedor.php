<?php

namespace Model;

class Vendedor extends ActiveRecord{

    protected static $tabla ='vendedores';
    protected static $columnas =['id','nombre', 'apellido','phone'];

    private $id;
    private $nombre;
    private $apellido;
    private $phone;
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->phone = $args['phone'] ?? '';
    }

    public function validar(): array{
        !$this->id ? self::$errores[] = 'Falta id' : '';
        !$this->nombre ? self::$errores[] = 'Falta nombre' : '';
        !$this->apellido ? self::$errores[] = 'Falta apellido' : '';
        !$this->phone ? self::$errores[] = 'Falta # telefono' : '';
        if(!preg_match('/[0-9]{10}/',$this->phone)){
            self::$errores[]='formato phone no valido';
        }
        return self::$errores;
    }
    public function setAll($key, $value){
        $this->$key = $value;
    }

    public function getAll($key){
        return $this->$key; 
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;

        return $this;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
        return $this;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function setPhone($phone){
        $this->phone = $phone;
        return $this;
    }
}
?>