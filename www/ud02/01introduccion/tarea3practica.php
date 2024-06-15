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

$a = "true";
echo "1. ". is_bool($a);
$c = "false";
echo "2. ".gettype($c);
$d = "";
echo "3. ".empty($d);
$e = 0.0;
echo "4. ".empty($e);
$f = 0;
echo "5. ".empty($f);
$g = false;
echo "6. ".empty($g);
$h;
echo "7. ".empty($h);
$i = "0";
echo "8. ".empty($i);
$j = "0.0";
echo "9. " . empty($j);
$k = true;
echo "10. " . isset($k);
$l = false;
echo "11. " . isset($l);
$m = true;
echo "12. " . is_numeric($m);
$n = "";
echo "13. " . is_numeric($n);
?>