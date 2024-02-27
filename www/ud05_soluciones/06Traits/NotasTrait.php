<?php

namespace ud05;

require_once 'CalculosCentroEstudiosTrait.php';
require_once 'MostrarCalculosTrait.php';

class NotasTrait
{
    use CalculosCentroEstudiosTrait;
    use MostrarCalculosTrait;

    private $notas;

    public function __construct($notas)
    {
        $this->notas = $notas;
    }

    public function calcularYMostrar()
    {
        $aprobados = $this->numeroDeAprobados($this->notas);
        $suspendidos = $this->numeroDeSuspensos($this->notas);
        $notaMedia = $this->notaMedia($this->notas);

        $this->saludo();
        $this->showCalculusStudyCenter($aprobados, $suspendidos, $notaMedia);
    }
}
