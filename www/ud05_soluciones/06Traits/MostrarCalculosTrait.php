<?php

namespace ud05;

trait MostrarCalculosTrait
{
    public function saludo()
    {
        echo "Bienvenido al centro de cálculo\n";
    }

    public function showCalculusStudyCenter($aprobados, $suspendidos, $notaMedia)
    {
        echo "Número de aprobados: $aprobados\n";
        echo "Número de suspensos: $suspendidos\n";
        echo "Nota media: $notaMedia\n";
    }
}
