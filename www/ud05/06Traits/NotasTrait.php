<?php
require_once "CalculosCentroEstudios.php";
require_once "MostrarCalculos.php";
class NotasTrait{
    use CalculosCentroEstudios, mostarCalculos;

    private array $arrayNotas;

    public function __construct(array $arrayNotas){
        $this->arrayNotas = $arrayNotas;
    }

    public function getNotas(){
        return $this->arrayNotas;
    }

    public function setNotas(array $arrayNotas){
        $this->arrayNotas = $arrayNotas;
    }

    public function resultados (array $notas) {
        $numeroAprobados;
    }
}

$notas = [5, 5, 5, 5, 10];
$claseNotas = new NotasTrait($notas);
$claseNotas->getNotas
?>