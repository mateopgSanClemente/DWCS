<?php
require_once "CalculosCentroEstudios.php";
abstract class Notas{
    protected array $notas;
    
    public function __construct(array $notas){
        $this->setNotas($notas);
    }

    public function setNotas(array $notas){
        $this->notas = $notas;
    }

    public function getNotas(){
        return $this->notas;
    }

    abstract public function toString();
}
?>