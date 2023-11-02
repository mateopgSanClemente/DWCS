<?php
/*1. Escribe un programa que pase de grados Fahrenheit a Celsius. 
Para pasar de Fahrenheit a Celsius se resta 32 a la temperatura, 
se multiplica por 5 y se divide entre 9.*/

$temperatura = 80;
$celsius = ($temperatura - 32)*(5/9);
echo $celsius;


/*2. Crea un programa en PHP que declare e inicialice dos 
variables x e y con los valores 20 y 10 respectivamente y
muestre la suma, la resta, la multiplicación, 
la división y el módulo de ambas variables. */
/*(Optativo) Haz dos versiones de este ejercicios.
    - Guarda los resultados en nuevas variables.
    - Sin utilizar variables intermedias. */

$x = 20;
$y = 10;
//sin variable intermedia
echo "Suma: ".$x+$y."<br>";
echo "Resta: ".$x-$y."<br>";
echo "Multiplicación: ".$x*$y."<br>";
echo "División: ".$x/$y."<br>";
echo "Módulo: ".$x%$y."<br>";


//con variable intermedia
$suma =  $x+$y;
$resta =  $x-$y;
$multiplicacion = $x*$y;
$division = $x/$y;
$modulo = $x%$y;

//Imprimimos resultados
echo "Suma: ".$suma."<br>";
echo "Resta: ".$resta."<br>";
echo "Multiplicación: ".$multiplicacion."<br>";
echo "División: ".$division."<br>";
echo "Módulo: ".$modulo."<br>";

/*3. (Optativo) Escribe un programa que imprima por pantalla los cuadrados de los 
30 primeros números naturales.*/ 
for($i=0; $i<31; $i++) {
   echo "El cuadrado de ".$i."es: ".pow($i,2)."<br>";
}

/*4. Hacer un programa php que calcule el área y el perímetro de un rectángulo
 (```área=base*altura``` y (```perímetro=2*base+2*altura```). Debéis declarar 
 las variables base=20 y altura=10. */
$base = 20;
$altura = 10;
$area = $base*$altura;
$perimetro = 2*$base+2*$altura;
echo "Un rectángulo con base: $base y altura $altura tiene un area de $area y un perímetro de $perimetro.";

?>