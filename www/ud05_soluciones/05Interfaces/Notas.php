<?php

namespace ud05;

abstract class Notas
{
    protected $notas;

    public function __construct($notas)
    {
        $this->notas = $notas;
    }

    abstract public function toString();

    protected function getNotas()
    {
        return $this->notas;
    }
}
