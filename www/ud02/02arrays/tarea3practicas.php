<?php
/*
1. Crea una matriz con 30 posiciones y que contenga números aleatorios entre 0 y 20 (inclusive).
Uso de la función [rand](https://www.php.net/manual/es/function.rand.php). 
Imprima la matriz creada anteriormente.
*/ 
$matriz = [];
for ($i = 0; $i < 30; $i++){
    $matriz[] = rand(0, 20);
}
function imprimirMatriz ($matriz){
    $posicion = 0;
    foreach($matriz as $elemento){
        echo "<br>Posicion: $posicion => Elemento: $elemento";
        $posicion++;
    }
}
imprimirMatriz($matriz);
/* 
2. (Optativo) Cree una matriz con los siguientes datos: 
`Batman`, `Superman`, `Krusty`, `Bob`, `Mel` y `Barney`.
    - Elimine la última posición de la matriz. 
    - Imprima la posición donde se encuentra la cadena 'Superman'. 
    - Agregue los siguientes elementos al final de la matriz: `Carl`, `Lenny`, `Burns` y `Lisa`. 
    - Ordene los elementos de la matriz e imprima la matriz ordenada. 
    - Agregue los siguientes elementos al comienzo de la matriz: `Apple`, `Melon`, `Watermelon`.
*/
$personajes = ["Batman", "Superman", "Krusty", "Bob", "Mel", "Barney"];
imprimirMatriz($personajes);
array_pop($personajes);
foreach($personajes as $indice => $personaje){
    if($personaje == "Superman"){
        echo "<br>Indice de superman: $indice";
    }
}
array_push($personajes, "Carl", "Lenny", "Burns", "Lisa");
sort($personajes);
imprimirMatriz($personajes);
array_unshift($personajes, "Apple", "Melon", "Watermelon");
imprimirMatriz($personajes);
//NOTA: si se quiere eliminar un elemento del inicio del array se usa la funcion shift().
/*3. (Optativo) Cree una copia de la matriz con el nombre `copia` con elementos del 3 al 5.
    - Agregue el elemento 'Pera' al final de la matriz. */
?>