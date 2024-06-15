<?php 
/**
 * Crea unha función chamada `comprobar_nif()` que reciba un NIF e devolva:
 *  `true` se o NIF é correcto.
 *  false` se o NIF non é correcto.
 * A letra do DNI é unha letra para comprobar que o número introducido anteriormente é correcto. 
 * Para obter a letra do DNI débense levar a cabo os seguintes pasos:
 * Dividimos o número entre 23.
 * Co resto da división anterior, obtemos a letra corresponde na seguinte táboa: 
 */
function comprobar_nif($nif){
    //Obtener digitos del dni y convertir esta variable a un tipo numerico;
    //NOTA: Podría crear el array sin indicar el índice
    $tablaLetraNif = [
        0 => "T",
        1 => "R",
        2 => "W",
        3 => "A",
        4 => "G",
        5 => "M",
        6 => "Y",
        7 => "F",
        8 => "P",
        9 => "D",
        10 => "X",
        11 => "B",
        12 => "N",
        13 => "J",
        14 => "Z",
        15 => "S",
        16 => "Q",
        17 => "V",
        18 => "H",
        19 => "L",
        20 => "C",
        21 => "K",
        22 => "E"
    ];
    $digitosDNI = "";
    $letraDNI = $nif[8];
    $letraDNI = strtoupper($letraDNI);
    for ($i = 0; $i < 8; $i++){
        $digitosDNI = $digitosDNI . $nif[$i];
    }
    //Retornar el tipo de dato entero correspondiente al valor de un dato tipo String
    $digitosDNI = intval($digitosDNI, 10);
    $moduloDNI = $digitosDNI%23;
    foreach($tablaLetraNif as $resto => $letra){
        if ($moduloDNI == $resto && $letraDNI == $letra){
            echo "El DNI $nif es válido.";
            return true;
        }
    }
    echo "El DNI $nif no es válido.";
    return false;
}

?>