<?php
require_once "CalculosCentroEstudios.php";
class Notas implements CalculosCentroEstudios{
    private array $notas = [];
    
    public function __construct(array $notas){
        $this->$notas = $notas;
    }

    public function setNotas(array $notas){
        $this->notas = $notas;
    }

    public function getNotas(){
        return $this->notas;
    }

    public function toString(){
        $stringNotas = "";
        foreach ($this->notas as $nota){
            $stringNotas .= $nota . "<br>";
        }
        return $notas;
    }
}
?>