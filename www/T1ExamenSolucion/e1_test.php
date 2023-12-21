<?php

require "e1.php";

$arrayCualquiera = array(4, 7, 4.5, 4.0, "hola", array());

function imprimirArray($array)
{
    print "======================================= <br>";
    foreach ($array as $key => $value) {
        echo var_dump($value);
    }
    print "======================================= <br>";
}

imprimirArray($arrayCualquiera);
imprimirArray(isPar($arrayCualquiera));
imprimirArray(isImpar($arrayCualquiera));
