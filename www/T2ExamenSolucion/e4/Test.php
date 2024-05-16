<?php

require_once 'Perro.php';
require_once 'Gato.php';

use e4\Perro;
use e4\Gato;

// Crear una instancia de Perro y probar los métodos
$miPerro = new Perro("Fido", 3);
echo "Nombre: " . $miPerro->obtenerNombre() . "\n";
echo "Sonido: " . $miPerro->emitirSonido() . "\n";
echo "Edad: " . $miPerro->obtenerEdad() . " años\n";

// Crear una instancia de Gato y probar los métodos
$miPerro = new Gato("Lupi", 2);
echo "Nombre: " . $miPerro->obtenerNombre() . "\n";
echo "Sonido: " . $miPerro->emitirSonido() . "\n";
echo "Edad: " . $miPerro->obtenerEdad() . " años\n";
