<?php

/**Busca en la documentación de PHP las funciones de [manejo de variables](http://www.php.net/manual/es/funcref.php)

Comprueba el resultado devuelto por los siguientes fragmentos de código y analiza el resultado:
```php
1- $a = “true”; // imprime el valor devuelto por is_bool($a)...
2- $c = “false”; // imprime el valor devuelto por gettype($c);
3- $d = “”; // el valor devuelto por empty($d);
4- $e = 0.0; // el valor devuelto por empty($e);
5- $f = 0; // el valor devuelto por empty($f);
6- $g = false; // el valor devuelto por empty($g);
7- $h; // el valor devuelto por empty($h);
8- $i = “0”; // el valor devuelto por empty($i);
9- $j = “0.0”; // el valor devuelto por empty($j);
10- $k = true; // el valor devuelto por isset($k);
11- $l = false; // el valor devuelto por isset($l);
12- $m = true; // el valor devuelto por is_numeric($m);
13- $n = “”; // el valor devuelto por is_numeric($n);
```
 */
//1- $a = “true”; // imprime el valor devuelto por is_bool($a)...
$a = "true";
$comprobar_a = is_bool($a);
echo "$comprobar_a";
/**
 * En este caso, como el valor de la variable $a se corresponde con la cadena e caractéres 'true', el resultado de la función is_bool()
 * es false, ya que una cadena de caracteres no es un tipo de dato booleano. Si imprimimos su resultado por pantalla vemos que no devuelve nada,
 * aunque en caso de llevar a cabo la misma operación con un boolean (ej. is_boolean(true)) imprimiría un 1.
 */

//2- $c = “false”; // imprime el valor devuelto por gettype($c);
$c = "false";
$tipo_c = gettype($c);
echo "$tipo_c<br>";

/**
 *      gettype(mixed $var): string
 * La función gettype() devuelve una cadena de caractéres con el tipo de dato de la variable que se le pasa como argumento. En este caso un tipo 'string'
 * ya que el valor de la variable $c, 'false', se declara entre comillas doble.
 */

//3- $d = “”; // el valor devuelto por empty($d);
$d = "";
$valor_d = empty($d);
echo "$valor_d<br>";
/**
 *      empty(mixed $var): bool
 * Para esta función los siguientes valores se consideran vacios:
 *   "" (una cadena vacía)
 *   0 (0 como un integer)
 *   0.0 (0 como un float)
 *   "0" (0 como un string)
 *   null
 *   false
 *   array() (un array vacío)
 * En este caso, como estamos evaluando un variable con un valor de tipo string sin ninguń caracter, la función devuelve 'true' e imprime 1 por pantalla.
 */

//4- $e = 0.0; // el valor devuelto por empty($e);
$e = 0.0;
$valor_e = empty($e);
echo "$valor_e<br>";
/**
 * En este caso la variable $e contiene un valor de tipo float '0.0', que da como resultado de la función empty() el valor true, haciendo que se imprima un 1.
 */

//5- $f = 0; // el valor devuelto por empty($f);
$f = 0;
$valor_f = empty($f);
echo "$valor_f<br>";
/**
 * El valor que devuelve la función empty() es 'true', ya que la variable que está evaluando es un entero de valor cero '0'. Por pantalla imprime 1.
 */

//6- $g = false; // el valor devuelto por empty($g);
$g = false;
$valor_g = empty($g);
echo "$valor_g<br>";
/**
 * La función empty() retorna el valor booleano 'true' cuando se le pasa como argumento un booleano con el valor 'false'. Por pantalla imprime 1.
 */

 //7- $h; // el valor devuelto por empty($h);
 $h;
 $valor_h = empty($h);
 echo "$valor_h<br>";
 /**
  * Devuelve 'true' e imprime 1, ya que la variable no se encuentra definida.
  */
 
 //8- $i = “0”; // el valor devuelto por empty($i);
 $i = "0";
 $valor_i = empty($i);
 echo "$valor_i<br>";
 /**
  * Devuelve 'true' e imprime 1 por pantalla.
  */

 //9- $j = “0.0”; // el valor devuelto por empty($j);
 $j = "0.0";
 $valor_j = empty($i);
 echo "$valor_j<br>";
 /**
  * En este caso, empty() tmabién devuelve 'true' e imprime 1.
  */

 //10- $k = true; // el valor devuelto por isset($k);
 $k = true;
 $valor_k = isset($k);
 echo "$valor_k<br>";
 /**
  *  isset(mixed $var, mixed $... = ?): bool
  * La función isset() evalúa si una variable está definida y no es nula. En este caso, $k está definida con el valor booleano 'true', por lo que devuelve 'true' e
  * imprime 1 por pantalla.
  */

 //11- $l = false; // el valor devuelto por isset($l);
 $l = false;
 $valor_f = isset($f);
 echo "$valor_f";
 /**
  * En este caso, como la variable está definida con el valor booleano 'false', isset() devuelve 'true' e imprime 1 por pantalla.
  */
 
 //12- $m = true; // el valor devuelto por is_numeric($m);
 $m = true;
 $valor_m = is_numeric($m);
 echo "$valor_m";
 /**
  * 
  * is_numeric(mixed $value): bool
  * La función is_numeric() devuelve true si el valor que se le pasa por parámetro es un numero o un string con un número como contenido.
  * En este caso devuelve 'false' y no imprime nada por pantalla.
  */

 //13- $n = “”; // el valor devuelto por is_numeric($n);
 $n = "";
 $valor_n = is_numeric($n);
 echo "$valor_n";
 /**
  * Devuelve 'false' y no imprime nada por pantalla.
  */
?>