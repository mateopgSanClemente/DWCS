<?php 

//1. Almacena en un array los 10 primeros números pares. Imprímelos cada uno en una línea.
$i=1; 
$count=0;
while($count<10){
    if($i%2==0){
        $pares[]=$i;
        $count++;
    }
    $i++;
}
print_r($pares);

/* 2. Imprime los valores del array asociativo siguiente usando un foreach:*/
$v[1]=90;
$v[10] = 200;
$v['hola']=43;
$v[9]='e';

foreach($v as $key=>$valor) {
    echo $key." - ".$valor. "<br>";
}
?>