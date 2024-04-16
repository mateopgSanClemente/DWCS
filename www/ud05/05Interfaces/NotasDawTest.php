<?php
    require_once "NotasDaw.php";
    $arrayNotas = [1,2,3, 4, 5, 6, 7, 8, 9, 10];
    $nuevasNotas = new NotasDaw($arrayNotas);
    echo $nuevasNotas->notaMedia() . "<br>";
    echo $nuevasNotas->numeroDeAprobados() . "<br>";
    echo $nuevasNotas->numeroDeSuspensos() . "<br>";
    echo $nuevasNotas->toString();
?>