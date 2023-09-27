<?php
session_start();

/*

| Dia Hora     | Salidas | Entradas | Total |
| 202309182000 | 50      | 80       | 30    |
| 202309182000 | 50      | 80       | 30    |

*/

$arrContadores = array(); 
$arrContadores = [];

// Arreglo Asociativo
$arrContador = array(
    "diahora" => "202309182000",
    "salidas" => 0,
    "entradas" => 0,
    "total" => 0
);

$arrContador1 = array(
    "diahora" => "202309181900",
    "salidas" => 39,
    "entradas" => 44,
    "total" => 5
);

$arrContadores[] = $arrContador;
$arrContadores[] = $arrContador1;


/*
// Arreglo Ordina
$arrColors = ["rojo", "azul", "verde", "gris","negro"];

$arrContador["salidas"]  === 0;

$arrColors[3] === "gris"

// Ejercicio mental

$arrDummy = array(
    "nombre" => "Fulanito",
    "apellido" => "de Tal",
    "Es algo interezante",
    40,
    "edad" => 19
);


// No es correcto
$arrDummy[2] === "Es aglo Interezante";

*/
function generarArregloContador() {
   $fechaContador = getFechaKey();
   return  array(
    "diahora" => $fechaContador,
    "salidas" => 0,
    "entradas" => 0,
    "total" => 0
); 
}

function getFechaKey(){
    return date("YmdH")."00";
}

function obtenerArregloSession(){
    $colleccionDeContadores = [];
    if (isset($_SESSION["colleccionDeContadores"])) {
        $colleccionDeContadores = $_SESSION["colleccionDeContadores"];
    }
    return $colleccionDeContadores;
}

function obtenerArregloFecha($fechaKey){
    $contadores = obtenerArregloSession();
    if(isset($contadores[$fechaKey])){
        return $contadores[$fechaKey];
    }
    return generarArregloContador();
}

function guardarEnSession($arregloFecha){
    $contadores = obtenerArregloSession();
    $contadores[$arregloFecha["diahora"]] = $arregloFecha;
    $_SESSION["colleccionDeContadores"] = $contadores;
}

function ingresaPersona($cantidad = 1) {
    $fechaKey = getFechaKey();
    $arregloFecha = obtenerArregloFecha($fechaKey);
    $arregloFecha["entradas"] += 1;
    $arregloFecha["total"] += 1;
    guardarEnSession($arregloFecha);
}

function salidaPersona($cantidad = 1) {
    $fechaKey = getFechaKey();
    $arregloFecha = obtenerArregloFecha($fechaKey);
    $arregloFecha["salidas"] += 1;
    $arregloFecha["total"] -= 1;
    guardarEnSession($arregloFecha);
}

?>