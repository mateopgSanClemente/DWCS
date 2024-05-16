<?php
require_once "CalculosCentroEstudios.php";
require_once "MostrarCalculos.php";
class NotasTrait{
    use CalculosCentroEstudios;
    use mostarCalculos;

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
}
?>