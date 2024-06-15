<?php
// 1. Crea una función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.
function comprobarCaracter ($char){
    $char = strval($char);
    if(strlen($char) == 1){
        if (ctype_digit($char)){
            echo "<br>El caracter es un dígito: $char";
        } else {
            echo "<br>El caracter no es un dígito: $char";
        }
    } else {
        throw new InvalidArgumentException("Se debe introducir un solo caracter como argumento");
    }
}

// 2. Crea una función que reciba un string e devolva a súa lonxitude.
function longitudString ($string){
    if (is_string($string)){
        echo "<br>La longitud del caracter \"$string\" es: " . strlen($string);
    } else {
        echo "<br>El argumento no es de tipo string";
    }
}
$string1 = "aaa";
$string2 = 100;
longitudString($string1);
longitudString($string2);
// 3. Crea una función que reciba dous número `a` e `b` e devolva o número `a` elevado a `b`.

// 4. Crea una función que reciba un carácter e devolva `true` se o carácter é unha vogal.
// 5. Crea una función que reciba un número e devolva se o número é par ou impar.
// 6. Crea una función que reciba un string e devolva o string en maiúsculas.
// 7. Crea una función que imprima a zona horaria (*timezone*) por defecto utilizada en PHP.
/* 8. Crea una función que imprima a hora á que sae e se pon o sol para a 
localización por defecto. Debes comprobar como axustar as coordenadas (latitude e lonxitude)
 predeterminadas do teu servidor.
*/
?>