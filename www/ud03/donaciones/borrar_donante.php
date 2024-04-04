<?php
include("lib/base_datos.php");
$id=$_GET["id"];
$conPDO=crear_conexion();
seleccionar_bd_donaciones($conPDO);
eliminar_donante($conPDO, $id);
$conPDO=null;
header("Location: ".$_SERVER['HTTP_REFERER']);
exit;
