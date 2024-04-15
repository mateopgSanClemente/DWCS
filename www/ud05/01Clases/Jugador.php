<?php
    require_once "Participante.php";
    class Jugador extends Participante{
        private array $posicionesPermitidas = ["portero", "defensa", "centrocampista", "delantero"];
        private string $posicion;
        
        public function __construct(string $nombre, int $edad, string $posicion){
            parent::__construct($nombre, $edad);
            $this->setPosicion($posicion);
        }

        public function setPosicion(string $posicion){
            if(in_array($posicion, $this->posicionesPermitidas)){
                $posicion = strtolower($posicion);
                $this->posicion = $posicion;
            } else {
                echo "<br>La posicion '$posicion' no es válida. Solo es posible dar las siguientes posiciones:";
                foreach($this->posicionesPermitidas as $p){
                    echo "<br>\t-$p";
                }
            }
        }

        public function getPosicion(){
            return $this->posicion;
        }
    }

    $jugador1 = new Jugador("Juan", 34, "portero");
    $jugador2 = new Jugador("Pedro", 56, "caballo");
    $jugador2 = new Jugador("Pedro", 56, "delantero");

    echo "<br>". $jugador1->getNombre();
    echo "<br>". $jugador1->getEdad();
    echo "<br>". $jugador1->getPosicion();
    $jugador1->setNombre("Juan 2");
    $jugador1->setEdad(567);
    $jugador1->setPosicion("defensa");
    echo "<br>". $jugador1->getNombre();
    echo "<br>". $jugador1->getEdad();
    echo "<br>". $jugador1->getPosicion();

    echo "<br>". $jugador2->getNombre();
    echo "<br>". $jugador2->getEdad();
    echo "<br>". $jugador2->getPosicion();
    $jugador2->setNombre("Pedro 2");
    $jugador2->setEdad(568);
    $jugador2->setPosicion("centrocampista");
    echo "<br>". $jugador2->getNombre();
    echo "<br>". $jugador2->getEdad();
    echo "<br>". $jugador2->getPosicion();
?>