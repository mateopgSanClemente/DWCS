<?php
trait CalculosCentroEstudios {
    //TODO: Adaptar los métodos al ejercicio actual
    function numeroDeAprobados(array $arrayNotas){
        $contadorAprobados = 0;
        foreach ($this->$arrayNotas as $nota){
            if($nota >= 5){
                $contadorAprobados++;
            }
        }
        return $contadorAprobados;
    }

    function numeroDeSuspensos(array $arrayNotas){
        $contadorSuspensos = 0;
        foreach ($arrayNotas as $nota){
            if($nota < 5){
                $contadorSuspensos++;
            }
        }
        return $contadorSuspensos;
    }
    
    function notaMedia(array $arrayNotas){
        $notaMedia = 0;
        foreach ($arrayNotas as $nota){
            $notaMedia += $nota;
        }
        $notaMedia = $notaMedia / count($arrayNotas);
        return $notaMedia;
    }
}
?>