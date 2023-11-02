<?php 

// 1. Crea una función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.
// Opción A
function es_digito($caracter) {
    if(is_integer($caracter) && $caracter>=0 && $caracter<=9) {
        return true;
    }
    else {
       return false; 
    }
}

if(es_digito("a")){
 echo "Es un dígito entre 0 y 9";
}

echo '<br>';
// Opción B
function es_digito_b($caracter) {
    $caracter>=0 && $caracter<=9 ? $es_digito= true : $es_digito= false ;
    return $es_digito;
}
echo es_digito(2);
echo '<br>';

// 2. Crea una función que reciba un string e devolva a súa lonxitude.
function longString($a) {
    return strlen($a);
}
echo longString('Hola');
echo '<br>';

// 3. Crea una función que reciba dous número `a` e `b` e devolva o número `a` elevado a `b`.
function exponente($a,$b) {
    if(is_numeric($a) && is_numeric($b)) {
        $resultado = pow($a,$b);
        return $resultado;
    }
}
echo exponente(2,3);
echo '<br>';

// 4. Crea una función que reciba un carácter e devolva `true` se o carácter é unha vogal.
function es_vocal($caracter) {
    
    $caracter = strtolower($caracter); //Lo convertimos a minúscula para comprobar mayúsculas y minúsculas
    $vocales = ['a', 'e', 'i', 'o', 'u'];
    return array_search($caracter, $vocales);
  
}
if(is_int((es_vocal('b')))){
    echo "Es una vocal";
}else{
    echo "No es una vocal";
}
echo '<br>';
// 5. Crea una función que reciba un número e devolva se o número é par ou impar.
function parImpar($numero) {
    if($numero %2==0) {
        return true;
    }else{
        return false;
    }
            
}
echo parImpar(4);
echo '<br>';

// 6. Crea una función que reciba un string e devolva o string en maiúsculas.
function minToMayus($string) {
    return strtoupper($string);
}
echo minToMayus('Hola');
echo '<br>';

// 7. Crea una función que imprima a zona horaria (*timezone*) por defecto utilizada en PHP.
function zonaHoraria() {
    return date_default_timezone_get();
}
echo zonaHoraria();
echo '<br>';

/* 8. Crea una función que imprima a hora á que sae e se pon o sol para a 
localización por defecto. Debes comprobar como axustar as coordenadas (latitude e lonxitude)
 predeterminadas do teu servidor.
*/
function puestaSol() {
    $fecha = time(); //creo el timestamp, aunque creo que no me pilla la fecha actual
    $latitud = ini_get("date.default_latitude"); // latitud
    $longitud = ini_get("date.default_longitude");//longitud
    $sunset_zenith = ini_get("date.sunset_zenith");
    $gmt_offset = 1; 
    $resultado = date_sunset($fecha,SUNFUNCS_RET_STRING,$latitud,$longitud,$sunset_zenith,$gmt_offset);
    return $resultado;
}
echo puestaSol();
echo '<br>';

?>