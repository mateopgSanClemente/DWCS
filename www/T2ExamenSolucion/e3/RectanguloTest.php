<?php

// Incluir la clase Rectangulo
require_once 'Rectangulo.php';
use e3\Rectangulo;

// Crear una instancia de Rectangulo
$rectangulo = new Rectangulo(5, 3);
$rectangulo->dibujar();

// Agrandar el rectángulo
$factorAgrandar = 2;
echo "Agrandando el rectángulo por un factor de {$factorAgrandar}:\n";
$rectangulo->agrandar($factorAgrandar);
$rectangulo->dibujar();

// Encoger el rectángulo
$factorEncoger = 3;
echo "Encogiendo el rectángulo por un factor de {$factorEncoger}:\n";
$rectangulo->encoger($factorEncoger);
$rectangulo->dibujar();
