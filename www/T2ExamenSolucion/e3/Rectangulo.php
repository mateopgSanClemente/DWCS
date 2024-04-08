<?php

namespace e3;

require_once 'Figura.php';

use e3\Figura;

class Rectangulo extends Figura
{
    private $ancho;
    private $alto;
    
    public function __construct($ancho, $alto)
    {
        $this->ancho = $ancho;
        $this->alto = $alto;
    }
    
    public function dibujar()
    {
        echo "Dibujando un rectángulo de ancho: $this->ancho y alto: $this->alto<br>";
    }
    
    public function agrandar($factor)
    {
        $this->ancho *= $factor;
        $this->alto *= $factor;
    }
    
    public function encoger($factor)
    {
        $this->ancho /= $factor;
        $this->alto /= $factor;
    }
}
