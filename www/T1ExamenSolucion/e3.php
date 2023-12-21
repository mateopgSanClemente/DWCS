<?php

function imprimirTabla($coches)
{
    echo "<table>\n";
    echo "<tr>\n";
    echo "<td>Marca</td>";
    echo "<td>Stock</td>";
    echo "<td>Ventas</td>";
    echo "</tr>\n";

    foreach ($coches as $coche) {
        $marca = $coche[0];
        $stock = $coche[1];
        $ventas = $coche[2];

        if (strlen($marca) > 4 && $ventas > 10) {
            echo "<tr>\n";
            echo "<td>$marca</td>";
            echo "<td>$stock</td>";
            echo "<td>$ventas</td>";
            echo "</tr>\n";
        }
    }

    echo "</table>\n";
}
