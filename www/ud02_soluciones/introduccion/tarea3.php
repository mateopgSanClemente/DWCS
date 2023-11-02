<?php

/**Busca en la documentación de PHP las funciones de [manejo de variables](http://www.php.net/manual/es/funcref.php)

Comprueba el resultado devuelto por los siguientes fragmentos de código y analiza el resultado:
```php
- $a = “true”; // imprime el valor devuelto por is_bool($a)...
- $c = “false”; // imprime el valor devuelto por gettype($c);
- $d = “”; // el valor devuelto por empty($d);
- $e = 0.0; // el valor devuelto por empty($e);
- $f = 0; // el valor devuelto por empty($f);
- $g = false; // el valor devuelto por empty($g);
- $h; // el valor devuelto por empty($h);
- $i = “0”; // el valor devuelto por empty($i);
- $j = “0.0”; // el valor devuelto por empty($j);
- $k = true; // el valor devuelto por isset($k);
- $l = false; // el valor devuelto por isset($l);
- $m = true; // el valor devuelto por is_numeric($m);
- $n = “”; // el valor devuelto por is_numeric($n);
```
 */


 $a = "true"; 
 echo(is_bool($a)); 
 $c = "false"; 
 echo(gettype($c)); //Es una cadena 
 $d = ""; 
 echo(empty($d)); //La variable está vacía
 $e = 0.0; 
 echo(empty($e)); //La variable está vacía
 $f = 0; 
 echo(empty($f));//La variable está vacía
 $g = false; 
 echo(empty($g)); //La variable está vacía, es un boolean false 
 $h; 
 echo(empty($h)); //La variable  no tiene ningún valor asignado y por lo tanto devuelve true, está vacía. 
 $i = "0"; 
 echo(empty($i)); //Devuelve true porque la la variable i está vacía al tener asignado 0 como string";
 $j = "0.0"; 
 echo(empty($j)); //Devuelve false, el valor 0.0 no lo trata como vacío. 
 $k = true; 
 echo(isset($k)); //Devuelve true ya que la variable está definida 
 $l = false; 
 echo(isset($l)); //Devuelve true ya que la variable está definida 
 $m = true; 
 echo(is_numeric($m)); //Devuelve false ya que es un booleano
 $n = ""; 
 echo(is_numeric($n)); //Devuelve false ya que es un número
?>