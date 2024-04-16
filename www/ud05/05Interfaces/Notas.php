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

    function numeroDeAprobados(){
        $contadorAprobados = 0;
        foreach ($this->notas as $nota){
            if($nota >= 5){
                $contadorAprobados++;
            }
        }
        return $contadorAprobados;
    }

    function numeroDeSuspensos(){
        $contadorSuspensos = 0;
        foreach ($this->notas as $nota){
            if($nota < 5){
                $contadorSuspensos++;
            }
        }
        return $contadorSuspensos;
    }
    function notaMedia(){
        $notaMedia = 0;
        foreach ($this->notas as $nota){
            $notaMedia += $nota;
        }
        $notaMedia = $notaMedia / count($this->notas);
        return $notaMedia;
    }
}
?>