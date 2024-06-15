<?php 

// 1. Crea una función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.
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
caracterDigito("0");

// 2. Crea una función que reciba un string e devolva a súa lonxitude.
function longitudString ($string){
    $contador = 0;
    for($i=0; $i < strlen($string); $i++){
        $contador++;
    }
    echo "<br>La longitud del string '$string' es $contador";
    return $contador;
}
longitudString("aaa");
// 3. Crea una función que reciba dous número `a` e `b` e devolva o número `a` elevado a `b`.
function potencia ($a, $b){
    $potencia = $a ** $b;
    echo "<br>$potencia";
    return ($a**$b);
}
potencia (2, 4);

// 4. Crea una función que reciba un carácter e devolva `true` se o carácter é unha vogal.
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
$comprobar = esVocal("a");
echo "<br>$comprobar";
$comprobar = esVocal("b");
echo "<br>$comprobar";

// 5. Crea una función que reciba un número e devolva se o número é par ou impar.
function parImpar ($numero) {
    if (is_numeric($numero)){
        if ($numero%2 == 0){
            echo "El numero es par";
        }else{
            echo "El numero es impar";
        }
    } else {
        echo "La variable introducida no es un número";
    }
}

// 6. Crea una función que reciba un string e devolva o string en maiúsculas.
function stringMayus ($string){
    $cadenaMayus = strtoupper($string);
    echo "$cadenaMayus";
    return $cadenaMayus;
}
$cadenaMinus = "cadena minusculas";
stringMayus($cadenaMinus);
// 7. Crea una función que imprima a zona horaria (*timezone*) por defecto utilizada en PHP.
function imprimirZonaHoraria (){
    //La zona por defecto es:
    $zonaHorariaPorDefecto = date_default_timezone_get();
    echo "<br>$zonaHorariaPorDefecto";
}
imprimirZonaHoraria();

/* 8. Crea una función que imprima a hora á que sae e se pon o sol para a 
localización por defecto. Debes comprobar como axustar as coordenadas (latitude e lonxitude)
 predeterminadas do teu servidor.
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
puestaSol();
?>