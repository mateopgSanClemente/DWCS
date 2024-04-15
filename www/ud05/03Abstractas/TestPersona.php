<?php
    require "Usuario.php";
    require "Administrador.php";

    $persona1 = new Usuario(12, "Anton", "Ambroa");
    $persona2 = new Administrador(456, "Boiro", "asd");
    $persona1->accion();
    $persona2->accion();
?>