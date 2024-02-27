<?php

require_once 'Alien.php';
use ud05\Alien;

// Crear varios objetos de Alien
$alien1 = new Alien("Alien 1");
$alien2 = new Alien("Alien 2");
$alien3 = new Alien("Alien 3");

// Mostrar el valor devuelto por el método getNumberOfAliens
echo "Número de aliens creados: " . Alien::getNumberOfAliens() . "\n";
