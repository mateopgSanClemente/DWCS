<?php
/*1. Escribe un programa que pase de grados Fahrenheit a Celsius. 
Para pasar de Fahrenheit a Celsius se resta 32 a la temperatura, 
se multiplica por 5 y se divide entre 9.*/
function convertirCelsius ($fahrenheit){
    $celsius = ($fahrenheit - 32) * 5 / 9;
    return $celsius;
}

/*2. Crea un programa en PHP que declare e inicialice dos 
variables x e y con los valores 20 y 10 respectivamente y
muestre la suma, la resta, la multiplicación, 
la división y el módulo de ambas variables. */
/*(Optativo) Haz dos versiones de este ejercicios.
    - Guarda los resultados en nuevas variables.
    - Sin utilizar variables intermedias. */
$x = 20;
$y = 10;
//Version 1
$suma = $x + $y;
$resta = $x - $y;
$multiplicacion = $x * $y;
$division = $x / $y;
$modulo = $x % $y;
//Version 2
echo "Suma: " . $x + $y . "\nResta: " . $x - $y . "\nMultiplicación: " . $x * $y . "\nDivisión: " . $x / $y . "\nModulo: " . $x % $y;
/*3. (Optativo) Escribe un programa que imprima por pantalla los cuadrados de los 
30 primeros números naturales.*/
$numero = 1; 
for ($i = 0; $i < 30; $i++){
    echo "<br>" . $numero * $numero;
    $numero++;
}
/*4. Hacer un programa php que calcule el área y el perímetro de un rectángulo
(```área=base*altura``` y (```perímetro=2*base+2*altura```). Debéis declarar 
las variables base=20 y altura=10. */

?>