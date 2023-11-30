<?php

namespace Model;

class Cita extends ActiveRecord{
        // Base de Datos 
        protected static $tabla = 'citas';
        protected static $columnasDB = ['id','fecha','hora','usuarioid','confirmada'];
     
        public $id;
        public $fecha;
        public $hora;
        public $usuarioid;
        public $confirmada;

    public function __construct($args = [])
    {   
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->usuarioid = $args['usuarioid'] ?? '';
        $this->confirmada = $args['confirmada'] ?? 0;
    }
}