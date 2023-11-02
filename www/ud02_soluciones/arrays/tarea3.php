<?php 

/*
1. Crea una matriz con 30 posiciones y que contenga números aleatorios entre 0 y 20 (inclusive).
Uso de la función [rand](https://www.php.net/manual/es/function.rand.php). 
Imprima la matriz creada anteriormente.
*/ 

for($i=0; $i<30; $i++){
    $matriz[$i] = rand(0,20);
}

foreach($matriz as $valor) {
    echo $valor. '<br>';
}

/* 
2. (Optativo) Cree una matriz con los siguientes datos: 
`Batman`, `Superman`, `Krusty`, `Bob`, `Mel` y `Barney`.
    - Elimine la última posición de la matriz. 
    - Imprima la posición donde se encuentra la cadena 'Superman'. 
    - Agregue los siguientes elementos al final de la matriz: `Carl`, `Lenny`, `Burns` y `Lisa`. 
    - Ordene los elementos de la matriz e imprima la matriz ordenada. 
    - Agregue los siguientes elementos al comienzo de la matriz: `Apple`, `Melon`, `Watermelon`.
*/

$matriz = ['Batman','Superman', 'Krusty', 'Bob', 'Mel', 'Barney'];

foreach($matriz as $valor) {
    echo $valor ." ";
}
echo "</br>";
//Elimnamos la última posición del array
array_pop($matriz); 
echo 'Eliminamos última posición. </br>';
foreach($matriz as $valor) {
    echo $valor ." ";
}
echo "</br>";
//Buscamos un valor
echo "El valor Superman se encuentra en la posición: " . array_search('Superman',$matriz)."</br>";

//Añadimos al final del array
array_push($matriz,'Carl', 'Lenny', 'Burns', 'Lisa' ); //añadir al final del array
echo 'Añadido al final del array: </br>';
foreach($matriz as $valor) {
    echo $valor ." ";
}
echo "</br>";


//Ordenamos la matriz 
sort($matriz);
echo 'Matriz ordenada </br>';
foreach($matriz as $valor) {
    echo $valor ." ";
}
echo "</br>";

//Añadimos al comienzo del array
array_unshift($matriz,'Apple', 'Melon', 'Watermelon' ); //añadir al inicio del array
echo 'Añadido al comienzo del array: </br>';
foreach($matriz as $valor) {
    echo $valor ." ";
}
echo "</br>";


/*3. (Optativo) Cree una copia de la matriz con el nombre `copia` con elementos del 3 al 5.
    - Agregue el elemento 'Pera' al final de la matriz. */ 

//Copiamos los valores desde la posición 3 (0,1,2) y le indicamos cuántos elementos (3). 
$copia = array_slice($matriz,2,3); 
echo 'Copia de la matriz</br>';
foreach($copia as $valor) {
    echo $valor ." ";
}
echo "</br>";

array_push($copia,'Pera' );
echo 'Añadido elemento al final </br>';
foreach($copia as $valor) {
    echo $valor ." ";
}
echo "</br>";
?>