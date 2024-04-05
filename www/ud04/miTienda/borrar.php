<?php
include ("lib/base_datos.php");
//Obter conexión
$conPDO = get_conexion();
//Seleccionar a bd
seleccionar_bd_tienda($conPDO);
//Ler o id de $_GET
$id=$_GET["id"];
//Executar consulta de borrado (delete)
borrar_datos($conPDO, $id);
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;