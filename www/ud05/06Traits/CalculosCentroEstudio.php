<?php
trait CalculosCentroEstudios {
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