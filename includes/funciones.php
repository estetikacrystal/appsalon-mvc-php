<?php

define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

// Valida si es el Ultimo para Calcular el Monto a Pagar 
function esUltimo(string $actual, string $proximo):bool{
    if($actual !== $proximo){
        return true;
    };
    return false;
}

// Funcion para Protejer el ADMIN de el Proyecto
function isAdmin() :void{

    if (!isset($_SESSION['admin'])){
        header('Location: /');
    }

}

// Funciones que revisan si el Usuario esta Identificado

function isAuth() : void{
    
    if(!isset($_SESSION['login'])){
        header('Location: /');
    }
}