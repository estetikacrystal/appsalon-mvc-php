<?php
    
    namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\Servicio;

class APIController{
    public static function index() {
        $servicio = Servicio::all();
        echo json_encode($servicio);
    }

    public static function guardar(){
        // $respuesta = [ 
        //     'data' => $_POST
        // ];
        // echo json_encode($respuesta);
       
        $cita = new Cita($_POST);
        // $respuesta = [
        //     'cita' => $cita
        // ];
        $resultado = $cita->guardar();
       
        $id = $resultado['id'];
       
        // Almacena la Cita y debe Cachar el Id de la Cita para Granar 
        // los servicios
        // Separo los Campos vienen por ","
        // Ciclo para Inserttar cada Servicio a su cita respectiva
        $idServicios = explode(",",$_POST['servicios']);
        
        foreach($idServicios as $idservicio){
            // Arreglo Asociativo 
            $args = [
                'citaId' => $id,
                'servicioId' => $idservicio
            ];
            $citaServicio = new CitaServicio($args);
            //echo json_encode($citaServicio);
            $citaServicio->guardar();
        };

        // Retornamos una Respuesta
        echo json_encode(['resultado'=>$resultado]);
       
    }

    public static function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];

            $cita = Cita::find($id);
            $cita->eliminar();
            header('Location:' . $_SERVER['HTTP_REFERER']);

            //echo json_encode(['resultado'=>$resultado]);
        }
    }

    public static function confirmar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];

            $cita = Cita::find($id);
            $cita->confirmar();
            header('Location:' . $_SERVER['HTTP_REFERER']);

            //echo json_encode(['resultado'=>$resultado]);
        }
    }
    public static function consultar(){
        
    }
}