<?php

namespace ud05;

class Alien
{
    public $nombre;
    public static $numberOfAliens = 0;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
        self::$numberOfAliens++;
    }

    public static function getNumberOfAliens()
    {
        return self::$numberOfAliens;
    }
}
