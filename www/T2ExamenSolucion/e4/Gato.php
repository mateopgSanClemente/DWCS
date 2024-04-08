<?php

namespace e4;

require_once 'Animal.php';

use e4\Animal;

// Clase concreta Perro extendiendo de Animal
class Gato extends Animal
{
    public function emitirSonido()
    {
        return "Miau! ¡Miau!";
    }
}
