<?php
    require_once "Alien.php";
    $alien1 = new Alien("Juan");
    $alien2 = new Alien("Maria");
    $alien3 = new Alien("Kodos");
    echo Alien::getNumberOfAliens();
?>