<?php
require_once "Articulo.php";
require_once "ArticuloPeriodico.php";
require_once "ArticuloRevista.php";

$articuloPeriodico = new ArticuloPeriodico("titulo1", "contenido1", "autor1");
$articuloRevista = new ArticuloRevista("titulo2", "contenido2", "autor2");
echo $articuloPeriodico->imprimirEnTabla();
echo $articuloPeriodico->imprimirEnLista();
echo $articuloRevista->imprimirEnTabla();
echo $articuloRevista->imprimirEnLista();
