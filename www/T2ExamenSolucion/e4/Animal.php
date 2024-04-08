<?php

namespace e4;

require_once 'Mascota.php';

use e4\Mascota;

abstract class Animal implements Mascota
{
    protected $nombre;
    protected $edad;
    
    public function __construct($nombre, $edad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
    
    public function obtenerNombre()
    {
        return $this->nombre;
    }
    
    abstract public function emitirSonido();
    
    public function obtenerEdad()
    {
        return $this->edad;
    }
}
