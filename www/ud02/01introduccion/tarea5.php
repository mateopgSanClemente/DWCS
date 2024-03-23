<?php
/*1. Escribe un programa que pase de grados Fahrenheit a Celsius. 
Para pasar de Fahrenheit a Celsius se resta 32 a la temperatura, 
se multiplica por 5 y se divide entre 9.*/
$fahrenheit = 100;

function farenheitCelsius ($fahrenheit) {
    $celsius = ($fahrenheit - 32) * 5 / 9;
    return $celsius;
}
$celsius = farenheitCelsius($fahrenheit);
printf("La teperatura en Celsius es de %.2f grados", $celsius);

/*2. Crea un programa en PHP que declare e inicialice dos 
variables x e y con los valores 20 y 10 respectivamente y
muestre la suma, la resta, la multiplicación, 
la división y el módulo de ambas variables. */
/*(Optativo) Haz dos versiones de este ejercicios.
    - Guarda los resultados en nuevas variables.
    - Sin utilizar variables intermedias. */
//MEDIANTE UNA FUNCIÓN
function calculos ($x = 20, $y = 10) {
    print("<br>Valores: x=$x y=$y<br>");
    $suma = $x + $y;
    $resta = $x - $y;
    $multiplicacion = $x * $y;
    $division = $x / $y;
    $modulo =  $x % $y;
    print ("<br>MEDIANTE UNA FUNCION: <br>Suma: $suma<br>Resta: $resta<br>Multiplicación: $multiplicacion<br>División: $division<br>Modulo: $modulo");
}
calculos();

//GUARDANDO LOS RESULTADOS EN NUEVAS VARIABLES
$x = 20;
$y = 10;
$suma = $x + $y;
$resta = $x - $y;
$multiplicacion = $x * $y;
$division = $x / $y;
$modulo =  $x % $y;
print ("<br>CON NUEVAS VARIABLES: <br>Suma: $suma<br>Resta: $resta<br>Multiplicación: $multiplicacion<br>División: $division<br>Modulo: $modulo");

//SIN VARIABLES INTERMEDIAS
print ("<br>SIN VARIABLES INTERMEDIAS:<br>Suma: " . ($x+$y) . "<br>Resta: " . ($x-$y) . "<br>Multiplicación: " . ($x*$y) . "<br>División: " . ($x/$y) . "<br>Modulo: " . ($x%$y) );

/*3. (Optativo) Escribe un programa que imprima por pantalla los cuadrados de los 
30 primeros números naturales.*/ 
function imprimirCuadrados () {
    for ($i = 1; $i <= 30; $i++) {
        $cuadrado = $i ** 2;
        print("<br>NUMERO: $i     CUADRADO: $cuadrado");
    }
}
imprimirCuadrados();

/*4. Hacer un programa php que calcule el área y el perímetro de un rectángulo
 (```área=base*altura``` y (```perímetro=2*base+2*altura```). Debéis declarar 
 las variables base=20 y altura=10. */
$base = 20;
$altura = 10;
function calcularAreaRectangulo ($base, $altura) {
    $area = $base * $altura;
    return $area;
}
function calcularPerimetroRectangulo ($base, $altura) {
    $perimetro = 2*$base + 2*$altura;
    return $perimetro;
}
$area = calcularAreaRectangulo($base, $altura);
$perimetro = calcularPerimetroRectangulo($base, $altura);
print ("<br>AREA: $area<br>PERIMETRO: $perimetro");
?>