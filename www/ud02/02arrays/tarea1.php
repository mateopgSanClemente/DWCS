<?php 

//1. Almacena en un array los 10 primeros números pares. Imprímelos cada uno en una línea utilizando los valores contenidos en el array.
$numerosPares=[];
for ($i = 1; count($numerosPares) < 10; $i++){
    if ($i%2==0) {
        $numerosPares[] = $i;
    }
}
foreach ($numerosPares as $numero){
    print "<br>$numero";
}

/* 2. Imprime los valores del array asociativo siguiente usando un foreach:*/
$v[1]=90;
$v[10] = 200;
$v['hola']=43;
$v[9]='e';
foreach ($v as $key => $value){
    print("<br>Clave: $key  => Valor: $value");
}
?>