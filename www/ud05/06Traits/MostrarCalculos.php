<?php
trait mostarCalculos{
    public function saludo(){
        echo "Bienvenidos al centro de cálculo.";
    }

    public function showCalculusStudyCenter($numeroAprobados, $numeroSuspensos, $notaMedia){
        echo "<br>--ESTADÍSTICAS--
        <br>\t-Numero aprobados: " . $numeroAprobados .
        "<br>\t-Número suspensos: " . $numeroSuspensos .
        "<br>\t-Nota media: " . $notaMedia;
    }
}
?>