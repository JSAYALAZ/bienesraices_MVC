<?php

namespace Model;

class ActiveRecord 
{

    protected static $db; //CONEXION A BD
    protected static $columnas = [];
    protected static $tabla = '';
    protected static $errores = [];
    
    public static function setDB($db){
        self::$db = $db;
    }

    public function insert()
    {
        if ($this->getAll('id')) {
            return ($this->actualizar());
        } else {
            return ($this->crear());
        }
    }
    public function crear()
    {
        $atributos = $this->sanitizarDatos();
        $ps_query = "INSERT INTO ".static::$tabla." ( ";
        $ps_query .= join(", ", array_keys($atributos));
        $ps_query .= " ) values ('";
        $ps_query .= join("', '", array_values($atributos));
        $ps_query .= "')";
        $resultado = self::$db->query($ps_query);
        return $resultado;
    }

    public function validar(): array{
        static::$errores=[];
        return static::$errores;
    }
    public static function getErrores() {
        return static::$errores;
    }
    public function actualizar()
    {
        $atributos = $this->sanitizarDatos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "$key = '$value'";
        }
        $query = 'UPDATE '.static::$tabla.' SET ';
        $query .= join(', ', $valores);
        $query .= ' WHERE id=' . self::$db->escape_string($this->getAll('id'));
        $query .= ' LIMIT 1 ';
        $result = self::$db->query($query);
        return $result;
    }

    public function eliminar()
    {
        $query = 'DELETE FROM '.static::$tabla.' ';
        $query .= "WHERE id='" . $this->getAll('id');
        $query .= "' LIMIT 1;";
        $result = self::$db->query($query);

        return $result;
    }

    public function setImagen($imagen) {
        // Elimina la imagen previa
        if($imagen) {
            if(!is_null($this->getAll('id'))){
                $this->borrarImagen();
            }
            $this->setAll('imagen',$imagen);
        }
        
        
    }
    
    public function sanitizarDatos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnas as $columna) {
            if(!in_array('phone',static::$columnas)){
                if ($columna == 'id') continue;
            }
            $atributos[$columna] =$this->getAll($columna);
        }
        return $atributos;
    }

    //LISTA TODAS LAS PROPIEDADES

    public static function all($limite=null): array
    {
        $query = 'SELECT * FROM ' . static::$tabla.($limite?(' LIMIT '.$limite):'');
        return self::consultarSQL($query);
    }

    //LLENA LOS ATRIBUTOS DE PROPIEDAD X ID
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = $id";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }


    public static function consultarSQL($query)
    {// RETORNA UN ARRAY DE objeto de la clase
        $arrayObjetos = [];
        $ps_resultado = self::$db->query($query);

        while ($resultado = $ps_resultado->fetch_assoc()) {
            $arrayObjetos[] = static::crearObjeto($resultado);
        }
        $ps_resultado->free();
        return $arrayObjetos;
    }


    public static function crearObjeto($ps_resultado)
    {//CREA OBJETOS DE TIPO PROPIEDAD
        $objeto=new static;
        foreach ($ps_resultado as $key => $value) {
            //debuguear('Key-> '.$key.' y value->'. $value );
            if (property_exists($objeto, $key)) {
                //debuguear($objeto);
                $objeto->setAll($key, $value);
            }
        }
        return $objeto;
    }
    public function setAll($key, $value){
        $this->$key = $value;
    }
    public function getAll($key){
        return $this->$key;
    }

    public function sincronizar($args)
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->setAll($key, $value);
            }
        }
    }
    

    //GETTER Y SETTERS
    

    public function borrarImagen()
    {
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->getAll('imagen'));
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->getAll('imagen'));
        }
    }
}

?>