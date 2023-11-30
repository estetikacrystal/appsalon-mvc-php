<?php
    
    namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;
    

class LoginController{
    public static function index(Router $router){
        $router->render('/auth/index',[
            'titulo' => 'Estética Krystal'
        ]);  
    }

    public static function blog(Router $router){
        $router->render('/auth/blog',[
            'titulo'=> 'Blog Estética Krystal'            
        ]); 
    }
    
    public static function reservar(Router $router){
       
        $router->render('/auth/reservar',[
            'titulo'=> 'Reserva tu Cita'            
        ]);  
    }
    
    public static function nosotros(Router $router){

        $router->render('/auth/nosotros',[
            'titulo'=> 'Nosotros'            
        ]); 
    }
    public static function login(Router $router){
        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $auth = new Usuario($_POST);  
            //$auth->sincronizar($_POST);
            // Cubrio el Formulario Login
            $alertas = $auth->validarLogin();
        
            if (empty($alertas)){    
                // Comprobar si el Usuario Existe
                $usuario = Usuario::where('email',$auth->email);
                if ($usuario){
                   if (!$usuario->validarConfirmacionAndPassword($auth->password)){
                        $alertas = Usuario::getAlertas();
                    } else{
                        // Autemtificamos al Usuario
                        session_start();

                        $_SESSION['login'] = true;
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;

                        // Redireccionamiento 
                        if ($usuario->admin === '1'){
                            // Admin
                            $_SESSION['admin'] = $usuario->admin ?? null;
                            header('Location: /admin');    
                        }else{
                            // Cliente
                            header('Location: /cita');
                        }
                        
                     
                    }                          
                }else{
                    Usuario::setAlerta('error','La Cuenta de Correo No está registrada');
                    $alertas = Usuario::getAlertas();
                }
                // Si está Confirmado 
            }
        }

        $router->render('/auth/login',[
            'alertas'=> $alertas,
            'auth' => $auth
        ]);  
    }
    public static function logout(){
        // Cierra Login y Session $_SESSION
        session_start();
        $_SESSION =[];
        header('Location: /');
    }

    public static function olvide(Router $router){
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Usuario($_POST);
            $alertas = $auth->validarEmail();
            if(empty($alertas)){
               $usuario = Usuario::where('email',$auth->email);
               if ($usuario && $usuario->confirmado === '1'){
                   // Generar un Token
                   $usuario->crearToken();
                   $usuario->guardar();

                   // Todo: Enviar Email
                   $email = new Email($usuario->email, $usuario->nombre . 
                   " " . $usuario->apellido, $usuario->token);
   
                   $email->enviarInstrucciones();  

                   // Alerta Existo
                   Usuario::setAlerta('exito','Revisa tu E-mail..sigue las Instrucciones');
                   
               }else{
                    Usuario::setAlerta('error','El usuario No existe o no esta confirmado');
               } 
            }
        }
        $alertas = Usuario::getAlertas();
        $router->render('/auth/olvide',[
            'alertas'=> $alertas
        ]);
    }

    public static function recuperar(Router $router){
        $alertas = [];
        $error = false;
        $token = s($_GET['token']);
        $auth = Usuario::where('token',$token);

        if(empty($auth)){
            Usuario::setAlerta('error','Token no válido...');
            $error= true;
        }else{

        }
        
        $alertas=Usuario::getAlertas();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Crea Objeto para POST 
            $password = new Usuario($_POST);
            $alertas = $password->validarPassword();           
            if(empty($alertas)){
               
                $auth->token = null;
                $auth->password = $password->password;
                // Hashear Password 
                $auth->hashPassword();
                $resultado = $auth->guardar();
           
                if ($resultado){
                    header('Location: /'); 
                }
            }
        }

        $router->render('/auth/recuperar-password',[
            'alertas'=> $alertas,
            'error'=> $error 
        ]);
    }

    public static function crear(Router $router){
        $usuario = new Usuario;
        $alertas = $usuario->validar();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();
            // Revisar que alertas este Vacio
            if (empty($alertas)){
                // Verificar que no este regostrado
                $resultado = $usuario->existeUsuario();
                if ($resultado->num_rows){
                    $alertas = usuario::getAlertas();
                }else{
                    // Hashear Password 
                    $usuario->hashPassword();
                    // Crear Token único
                    $usuario->crearToken();

                    // Mandar el Email 
                    $email = new Email($usuario->email, $usuario->nombre . 
                                    " " . $usuario->apellido, $usuario->token);
                    
                    $email->enviarConfirmacion();     

                    $resultado = $usuario->guardar();
                    
                    if ($resultado){
                        header('Location: /mensaje'); 
                    }
                }
            }
        }

        $router->render('/auth/crear-cuenta',[
            'usuario'=> $usuario,
            'alertas'=> $alertas
        ]);
    
    }

    public static function mensaje(Router $router){
        $router->render('auth/mensaje',[

        ]);
    }

    public static function confirmar(Router $router){
        // Verifca el Token si NO Rechaza la CVomfirmacion
        $alertas = [];
        $token = s($_GET['token']);

        $usuario = Usuario::where('token',$token);

        if (empty($usuario)){
            // Mostrar Error 
            Usuario::setAlerta('error','Confirmacion fallida');
            
        }else{
            // Modificar Usuario Confirmado
            Usuario::setAlerta('exito','Confirmacion Satisfactoria');
            $usuario->token = null;
            $usuario->confirmado = '1';
            $usuario->guardar();
        }
        // Obtener Alertas 
        $alertas = Usuario::getAlertas();

        // Renderizar la Vista View
        $router->render('auth/confirmar-cuenta',[
                'alertas' => $alertas
        ]);
    }

}