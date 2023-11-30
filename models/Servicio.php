<?php

namespace Model;

class Servicio extends ActiveRecord{
    // Base de Datos 
    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id','nombre','precio', 'imagen','promocion'];
 
    public $id;
    public $nombre;
    public $precio;
    public $imagen;
    public $promocion;

    public function __construct($args = [])
    {   
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->promocion = $args['promocion'] ?? 0;
    }

     // Mensaje de Validacion de Campos Servicios  
    public function validar(){
        
       if (!$this->nombre){
           self::setAlerta('error',"El nombre del servicio es requerido");
       }
       if (!$this->precio){
           self::setAlerta('error',"El precio del servicio es requerido");
       }
       // if (!$this->imagen){
       //     self::setAlerta('error',"La Imagen del Servicio es requerido");
       // }
       // Validamos que solo sean Numeros
       if(!is_numeric($this->precio)){
           self::setAlerta('error',"El precio sólo recibe valores numéricos");    
       }
       return self::getAlertas();
    }
    

    public function setImagen($img){
        $this->imagen = $img;
    }
}