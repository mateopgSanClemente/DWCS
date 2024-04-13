<?php
    require_once "Empleado.php";
    $empleado1 = new Empleado("Mateo", 2001);
    $empleado2 = new Empleado("Ana", 2000);
    echo "<br>" . $empleado2->getNombre();
    echo "<br>" . $empleado2->getSalario();
    $empleado2->setNombre("Julia");
    echo "<br>" . $empleado2->getNombre();
?>