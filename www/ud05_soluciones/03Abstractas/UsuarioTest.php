<?php

require_once 'Usuario.php';
use ud05\Usuario;

// Crear un usuario
$usuario = new Usuario('1', 'Juan', 'Pérez');
$usuario->accion();
echo "\n";
