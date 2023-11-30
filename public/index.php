<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\APIController;
use Controllers\CitaController;
use Controllers\LoginController;
use Controllers\ServicioController;
use MVC\Router;

$router = new Router();

// Iniciar Session 
$router->get('/',[LoginController::class, 'index']);
$router->get('/login',[LoginController::class, 'login']);
$router->post('/login',[LoginController::class, 'login']);
$router->get('/nosotros',[LoginController::class, 'nosotros']);
$router->get('/blog',[LoginController::class, 'blog']);
$router->get('/reservar',[LoginController::class, 'reservar']);

// Cerrar Session 
$router->get('/logout',[LoginController::class, 'logout']);
 
// Recuperar Password 
$router->get('/olvide',[LoginController::class, 'olvide']);
$router->post('/olvide',[LoginController::class, 'olvide']);
$router->get('/recuperar',[LoginController::class, 'recuperar']);
$router->post('/recuperar',[LoginController::class, 'recuperar']);

// Crear la Cuenta de un Usuario o Cliente 
$router->get('/crear-cuenta',[LoginController::class, 'crear']);
$router->post('/crear-cuenta',[LoginController::class, 'crear']);

// Coonfirmar cuenta de usuario 
$router->get('/confirmar-cuenta',[LoginController::class, 'confirmar']);
$router->get('/mensaje',[LoginController::class, 'mensaje']);

// Area Privada 
$router->get('/cita',[CitaController::class,'index']);
$router->get('/admin',[AdminController::class,'index']);

// API de Citas 
$router->get('/api/servicios',[APIController::class,'index']);
$router->post('/api/citas',[APIController::class,'guardar']);
$router->post('/api/eliminar',[APIController::class,'eliminar']);
$router->post('/api/confirmar',[APIController::class,'confirmar']);

// Servicio Controllers ( CRUD de Servicios )
$router->get('/servicios',[ServicioController::class,'index']);
$router->get('/servicios/crear',[ServicioController::class,'crear']);
$router->post('/servicios/crear',[ServicioController::class,'crear']);
$router->get('/servicios/actualizar',[ServicioController::class,'actualizar']);
$router->post('/servicios/actualizar',[ServicioController::class,'actualizar']);
$router->post('/servicios/eliminar',[ServicioController::class,'eliminar']);
$router->get('/servicios/consultar',[ServicioController::class,'consultar']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();