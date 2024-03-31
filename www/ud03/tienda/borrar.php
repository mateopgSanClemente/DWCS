<?php
include ("lib/base_datos.php");
//Obter conexión
$conPDO = get_conexion();
//Seleccionar a bd
seleccionar_bd_tienda($$conPDO);
//Ler o id de $_GET
//Executar consulta de borrado (delete)