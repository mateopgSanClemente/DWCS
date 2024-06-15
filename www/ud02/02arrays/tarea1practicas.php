<?php
//1. Almacena en un array los 10 primeros números pares. Imprímelos cada uno en una línea utilizando los valores contenidos en el array.
$arrayPares = [];
for ($i = 2; count($arrayPares) < 10; $i++){
    if ($i % 2 == 0) {
        $arrayPares[] = $i;
    }
}
//var_dump($arrayPares);
foreach ($arrayPares as $numero) {
    echo "<br>$numero";
}
/* 2. Imprime los valores del array asociativo siguiente usando un foreach:*/
$v[1]=90;
$v[10] = 200;
$v['hola']=43;
$v[9]='e';
foreach($v as $key => $value) {
    echo "<br>Clave: $key" . " Valor: $value";
}
?>