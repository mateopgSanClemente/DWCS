<?php

require_once 'ExcepcionPropiaClase.php';
use ud05\ExcepcionPropiaClase;
use ud05\ExcepcionPropia;

// Pruebas con diferentes valores
try {
    ExcepcionPropiaClase::testNumber(5);
    echo "El número es válido.\n";
} catch (ExcepcionPropia $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

try {
    ExcepcionPropiaClase::testNumber(0);
    echo "El número es válido.\n";
} catch (ExcepcionPropia $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

try {
    ExcepcionPropiaClase::testNumber(-3);
    echo "El número es válido.\n";
} catch (ExcepcionPropia $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
