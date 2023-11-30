<?php

    namespace Controllers;

use MVC\Router;
use Model\Servicio;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Usuario;

class ServicioController{

    public static function index(Router $router){
        session_start();
        isAdmin();
        $servicios = Servicio::all();

        $router->render('servicios/index',[
            'nombre' => $_SESSION['nombre'],
            'servicios' => $servicios
        ]);
    }
    public static function crear(Router $router){
        session_start();
        isAdmin();
        $servicio = new Servicio;
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $servicio->sincronizar($_POST);
            $alertas = $servicio->validar();
            // Agrega si todo esta OK
            if(empty($alertas)){
                // Crea la carpeta de Inagenes 
                $files = $_FILES['imagen'];

                if (!empty($files && $files['tmp_name'] !== '')){
                    if(!is_dir(CARPETA_IMAGENES)){
                        mkdir(CARPETA_IMAGENES);
                     }
                        
                     $nombreImagen = md5(uniqid(rand(),true)) . '.jpg';
                        
                     if($files['tmp_name']){
                       $servicio->imagen = $nombreImagen;
                       $image = Image::make($files['tmp_name'])->fit(800,600);    
                     }
                     // Guarda Imagen en la Carpeta del SERVER
                     $image->save(CARPETA_IMAGENES . $nombreImagen);        
                }else{
                     Servicio::setAlerta('error','Debe de seleccionar una Imagen del Servicio');
                     $alertas = Servicio::getAlertas();
                }
                
                if(empty($alertas)){
                    $servicio->guardar();
                    header('Location: /servicios');    
                }
                
            }
        }
        $router->render('servicios/crear',[
            'nombre' => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }
    public static function actualizar(Router $router){
        session_start();
        isAdmin();

        $alertas = [];
        
        if (!is_numeric($_GET['id'])) return;
        $id = $_GET['id'];
        $servicio = Servicio::find($id);
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
           
            $servicio->sincronizar($_POST);
            if (isset($_POST['promocion'])){
                $servicio->promocion = '1';
            }else{
                $servicio->promocion = '0';
            }
            $alertas = $servicio->validar();
            if(empty($alertas)){
              // Debe de Borrar la Imagen 
              $files = $_FILES['imagen'];
              $nombreImagen = md5(uniqid(rand(),true)) . '.jpg';
              
              if (!empty($files['tmp_name'])){
                   // Generar un Nombre Unico 
                   
                  $resultado = unlink(CARPETA_IMAGENES . $servicio->imagen);
                  //debuguear($resultado);  
                  //debuguear($nombreImagen);
                  $servicio->setImagen($nombreImagen);    
                  $image = Image::make($files['tmp_name'])->fit(800,600);
                  // Guarda Imagen en la Carpeta del SERVER
                  $image->save(CARPETA_IMAGENES . $nombreImagen);
                 
              }
              $servicio->guardar();
              header('Location: /servicios');
            }
        }
       
        $router->render('servicios/actualizar',[
            'nombre' => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }

    public static function eliminar(){
        session_start();
        isAdmin();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $servicio = Servicio::find($id);
            $resultado = unlink(CARPETA_IMAGENES . $servicio->imagen);
            $servicio->eliminar();
            header('Location: /servicios');
        }
    }

    public static function consultar(Router $router){
        
        $servicios = Servicio::all();

        $router->render('servicios/consulta',[
            'servicios' => $servicios
        ]);
    }

}