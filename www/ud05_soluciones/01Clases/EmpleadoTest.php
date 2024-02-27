<?php

require_once "Empleado.php";

use ud05\Empleado;

$empleadoManuel = new Empleado("Manuel", 1900);

echo "Empleado: <br>";
echo $empleadoManuel -> getNombre() . "<br>";
echo $empleadoManuel -> getSalario() . "<br>";

// Comprobamos el número total de empleados:
echo "<h3>El número de empleados es: " . Empleado::getNumEmpleados() . "</h3>";
