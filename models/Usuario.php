<?php
namespace Model;

class Usuario extends ActiveRecord{
    // Base de Datos 
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id','nombre','apellido',
        'email','password','telefono','admin','confirmado','token'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? '';
    }
        
    // Mensaje de Validacion de Campos Cuenta / Usuario 
    public function validarNuevaCuenta(){
        
        if (!$this->nombre){
            self::setAlerta('error',"El nombre del usuario es requerido");
        }
        if (!$this->apellido){
            self::setAlerta('error',"El apellido del usuario es requerido");
        }
        if (!$this->email){
            self::setAlerta('error',"El e-mail del usuario es requerido");
        }
        if (!$this->telefono){
            self::setAlerta('error',"El teléfono del usuario es requerido");
        }else{
             if (strlen($this->telefono) > 10){
            self::setAlerta('error',"La Longitud del teléfono no debe de ser mayor a 10, verifique !!");
        }
        }
        if (!$this->password){
            self::setAlerta('error',"El password del usuario es requerido");
        }
        if (strlen($this->password) < 6 ){
            self::setAlerta('error',"El password del usuario no puede ser menor a 6 digitos");
        }
        return self::getAlertas();
    }

    // Validar Login 
    public function validarLogin(){
        if (!$this->email){
            self::setAlerta('error',"El e-mail del usuario es requerido");
        }
        if (!$this->password){
            self::setAlerta('error',"El password del usuario es requerido");
        }
        if (strlen($this->password) < 6 ){
            self::setAlerta('error',"El password del usuario no puede ser menor a 6 digitos");
        }
        return self::getAlertas();
    }

    // Validar Password 
    public function validarPassword(){
        if (!$this->password){
            self::setAlerta('error',"El password del usuario es requerido");
        }
        if (strlen($this->password) < 6 ){
            self::setAlerta('error',"El password del usuario no puede ser menor a 6 digitos");
        }
        return self::getAlertas();
    }
     // Validar Email 
     public function validarEmail(){
        if(!$this->email){
            self::setAlerta('error',"El e-mail es requerido..verifique");
        }

        return self::getAlertas();
    }
    
    // Valida si la Cuenta No existe
    public function existeUsuario(){
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);
        
        if ($resultado->num_rows){
            self::setAlerta('error',"El usuario ya se encuentra registrado");
        }
        return $resultado;
        
    }

    // Hashear Password para Insercion DB
    public function hashPassword(){
        $this->password = password_hash($this->password,PASSWORD_BCRYPT);
    }

    // Token
    public function crearToken(){
        $this->token = uniqid();
    }

    // Valida Confirmacion y Password 
    public function validarConfirmacionAndPassword($passwor){
        $resultado = password_verify($passwor, $this->password);
        if(!$resultado || !$this->confirmado){
            self::setAlerta('error','El Usuario no esta Confirmado, o el Password es Incorrecto');
        }else{
            return true;
        } 
    }

   
}