<?php
//EJERCICIO 1
//PEDIENTE: Funciona pero da error.
function contarVocales ($string) {
    $contador = 0;
    $stringMinus = strtolower($string);
    $stringArray = str_split($stringMinus);

    for ($i = 0; $i <= count($stringArray); $i++){
        $caracterCadena = "";
        //Undefined array key ¿?
        $caracterCadena = $stringArray[$i];

        if ($caracterCadena == "a" || $caracterCadena == "e" || $caracterCadena == "i" || $caracterCadena == "o" || $caracterCadena == "u"){
            $contador++;
        }
    }
    return $contador;
}

//EJERCICIO 2
//PENDIENTE: Funciona pero da error
function obtenerVocales ($string){
    $arrayVocales = [];
    $string = strtolower($string);
    $caracterCadena = "";
    for ($i = 0; $i <= strlen($string); $i++){
        //Uninitialized string offset 28
        $caracterCadena = $string[$i];
        if ($caracterCadena == "a" || $caracterCadena == "e" || $caracterCadena == "i" || $caracterCadena == "o" || $caracterCadena == "u"){
            $arrayVocales[] = $string[$i];
        }
    }
    return $arrayVocales;
}