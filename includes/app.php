<?php 

require __DIR__ . '/../vendor/autoload.php';

// Implementamos Lucas para las Variables de Entorno
$doctenv = Dotenv\Dotenv::createImmutable(__DIR__);
// Si no existe se pone
$doctenv->safeLoad();


require 'funciones.php';
require 'database.php';


// Conectarnos a la base de datos
use Model\ActiveRecord;
ActiveRecord::setDB($db);