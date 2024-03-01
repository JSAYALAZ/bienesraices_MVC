<?php
namespace Model;

class Admin extends ActiveRecord{
    protected static $tabla ='usuarios';
    protected static $columnas = ['id','mail', 'passwd'];
    //siempre colocar mismos nosmbres de la db
    public $id;
    public $email;
    public $passwd;

    public function __construct($args =[]){
        $this->id=$args['id']??null;
        $this->email=$args['email']??'';
        $this->passwd=$args['passwd']??'';
    }

    public function validar(): array{
        !$this->email?self::$errores[]='Falta un email':'';
        !$this->passwd?self::$errores[]='Falta un password':'';
        return self::$errores;
    }

    public function existeUsuario(){
        $query ='SELECT * FROM ' . self::$tabla;
        $query.=" WHERE mail = '".$this->email."'";
        $query.= " LIMIT 1";
        $resultado = self::$db->query($query);
        if(!$resultado->num_rows){
            self::$errores[]='Usuario no existe';
            return;
        }
        return $resultado;
    }
    
    public function comprobarPasswd($resultado){
        $usuario = $resultado->fetch_object();
        $autenticado = password_verify($this->passwd,$usuario->passwd);

        if(!$autenticado){
            self::$errores[]='Password incorrecto';
        }
        return $autenticado;
    }

    public function redireccionar(){
        session_start();
        //llenar  el arreglo de sesion
        $_SESSION['usuario']=$this->email;
        $_SESSION['login']=true;
        header('Location: /admin');
    }

}