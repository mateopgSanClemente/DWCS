<?php

/**
 * Recibe un caracter como parámetro e imprime por pantalla si este se un dígito entre 0 y 9.
 * 
 * @param string $caracter Un string que debe contener un solo caracter.
 * 
 */
function caracterDigito ($caracter){
    if(is_string($caracter)){
        if(strlen($caracter) == 1){
            if (is_numeric($caracter)){
                echo "El caracter se corresponde con el dígito: $caracter";
            } else {
                echo "El caracter no es un dígito";
            }
        } else {
            echo "La cadena debe contener un solo caracter de tipo numerico entre 0 y 9";
        }
    } else {
        echo "La variable no es un string";
    }
}

/**
 * Función que imprime por pantalla la cadena que se le pasa como parámetro junto con la cantidad de caracteres que la conforman. Retorna la cantidad de caracteres.
 * @param string $string Cadena de caracteres sobre la que se realizan las operaciones.
 * @return int Longitud de la cadena.
 */
function longitudString ($string){
    $contador = 0;
    //No tiene sentido utilizar la función strlen() para calcular la longitud de una cadena mediante un bucle, lo hice solo para practicar.
    for($i=0; $i < strlen($string); $i++){
        $contador++;
    }
    echo "<br>La longitud del string '$string' es $contador";
    return $contador;
}

/**
 * Funcion que recibe dos números, $a y $b, elevando $a a $b. Retorna la potencia de $a elevada a $b.
 * @param int $a base de la potencia.
 * @param int $b exponente de la potencia.
 * @return int Potencia de $a elevado a $b.
 */
function potencia ($a, $b){
    //En nungun momento evaluo si los parámetros son enterios o flotantes.
    $potencia = $a ** $b;
    echo "<br>$potencia";
    return ($a**$b);
}

/**
 * Función que reconoce si el caracter que se le pasa por parámetro es una vocal. Devuelve true si el parámetro es una vocal y false en cualquier otro caso.
 * @param string $caracter Cadena de caracteres a evaluar.
 * @return boolean Verdadero si la cadena está formada por una vocal, False en cualquier otro caso.
 */
function esVocal($caracter){
    switch ($caracter) {
        case "a":
            return true;
        case "e":
            return true;
        case "i":
            return true;
        case "o":
            return true;
        case "u":
            return true;
        default:
            return false;
    }
}

// 5. Crea una función que reciba un número e devolva se o número é par ou impar.
/**
 * Función que determina si el número que se le pasa por parámetro es par o impar, imprimiendo el resultado por pantalla.
 * @param int|float|string $numero Número a evaluar.
 * 
 */
function parImpar ($numero) {
    if (is_numeric($numero)){
        $numero = floatval($numero);//Es un buena práctica convertir explicitamente el valor que se pasa por parámetro de string a int o float, para evitar errores o resultados iniesperados.
        if ($numero%2 == 0){
            echo "El numero es par";
        }else{
            echo "El numero es impar";
        }
    } else {
        echo "La variable introducida no es un número";
    }
}

/**
 * Función que recoge una cadena de caracteres e imprime dicha cadena en mayúsculas por pantalla. También retorna la cadena que se le pasa por parámetro en mayúsculas.
 * @param string $string Cadena de caracteres.
 * @return string Cadena de caracteres $string convertida a mayúsculas.
 */
function stringMayus ($string){
    $cadenaMayus = strtoupper($string);
    echo "$cadenaMayus";
    return $cadenaMayus;
}

/**
 * Función que imprimer la zona horaria utilizada por defecto en PHP.
 */
function imprimirZonaHoraria (){
    //Se indica la zona horaria
    //date_default_timezone_set('Europe/Madrid');
    //Se indican los locales para que los nombres aparezcan en español
    //setlocale(LC_ALL, 'es_ES.UTF-8');
    $zonaHorariaPorDefecto = date_default_timezone_get();
    echo "<br>$zonaHorariaPorDefecto";
}

/* 8. Crea una función que imprima a hora á que sae e se pon o sol para a 
localización por defecto. Debes comprobar como axustar as coordenadas (latitude e lonxitude)
 predeterminadas do teu servidor.
*/
/**
 * Imprime por pantalla la hora a la que sale y se pone el sol. Por defecto sus parámetros apuntan a Galicia.
 * @param float $latitud Latitud de la zona.
 * @param float $longitud Longitud de la zona.
 */
function puestaSol ($latitud=42.7550800, $longitud=-7.8662100) {
    //Por defecto recoge las coordenadas de galicia.
    //Establecer la zona horaria:
    date_default_timezone_set('Europe/Madrid');
    //Indicar los locales:
    setlocale(LC_ALL, 'es_ES.UTF-8');
    //TimeStamp actual
    $timeStampActual = time();
    $sunInfo = date_sun_info($timeStampActual, $latitud, $longitud);
    echo "<br>Hora amanecer: " . date("H:i:s",$sunInfo['sunrise']) . "<br>Hora anochecer: " . date("H:i:s",$sunInfo['sunset']);
}

/**
 * Crea unha función chamada `comprobar_nif()` que reciba un NIF e devolva:
 *  `true` se o NIF é correcto.
 *  false` se o NIF non é correcto.
 * A letra do DNI é unha letra para comprobar que o número introducido anteriormente é correcto. 
 * Para obter a letra do DNI débense levar a cabo os seguintes pasos:
 * Dividimos o número entre 23.
 * Co resto da división anterior, obtemos a letra corresponde na seguinte táboa: 
 * @param string $nif DNI que se pretende validar.
 * @return boolean Deulve true en caso de que el DNI/NIF se válido, devuelve false en caso contrario.
 */
function comprobar_nif($nif){
    //Obtener digitos del dni y convertir esta variable a un tipo numerico;
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
    $digitosDNI =intval($digitosDNI, 10);
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