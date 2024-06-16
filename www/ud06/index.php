<?php

declare(strict_types=1);

require_once 'flight/Flight.php';
// require 'flight/autoload.php';

Flight::route('/', function () {
    echo 'hello world!';
});

//Probando FLight
Flight::route('/saludar', function (){
    echo "Hola buenas tardes!";
});
Flight::start();
