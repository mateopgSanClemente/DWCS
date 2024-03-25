<?php 

/*
1. Crea una matriz con 30 posiciones y que contenga números aleatorios entre 0 y 20 (inclusive).
Uso de la función [rand](https://www.php.net/manual/es/function.rand.php). 
Imprima la matriz creada anteriormente.
*/ 
$matriz = [];
while (count($matriz) < 30) {
    $matriz[] = rand(0, 20);
}
$contador=1;
foreach ($matriz as $elemento){
    
    print ("<br>Elemento nº$contador: $elemento");
    $contador++;
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
function imprimirMatrizNumerica($matriz){
    for($i=0; $i < count($matriz); $i++){
        print("<br>$matriz[$i]");
    }
}
$simpsons = ["Batman", "Superman", "Krusty", "Bob", "Mel", "Barney"];
imprimirMatrizNumerica($simpsons);
//Eliminar última posición de la matriz
array_pop($simpsons);
imprimirMatrizNumerica($simpsons);
//Imprimir última posición donde se encuentra la cadena 'Superman'
for ($i=0; $i < count($simpsons); $i++){
    if($simpsons[$i]=="Superman"){
        print ("<br>Se encontro la cadena 'Superman' en la posición $i.");
    }
}
//Agregue los siguientes elementos al final de la matriz: `Carl`, `Lenny`, `Burns` y `Lisa`.
array_push($simpsons, "Carl", "Lenny", "Burns", "Lisa");
imprimirMatrizNumerica($simpsons);
/*3. (Optativo) Cree una copia de la matriz con el nombre `copia` con elementos del 3 al 5.
    - Agregue el elemento 'Pera' al final de la matriz. */ 
function copiarArray ($array){
    $copiar = [];
    for ($i=3; $i <= 5; $i++){
        $copia[] = $array[$i];
    }
    $copia[] = "Pera";
    return $copia;
}

/**
 * Otra forma de llevar a cabo la misma tarea:
 * 
 */
$copia [] = [$simpsons[3], $simpsons[4], $simpsons[5], "Pera"];
$copia = copiarArray($simpsons);
var_dump($copia);

?>