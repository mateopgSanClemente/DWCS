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
            if(in_array($posicion, $posicionesPermitidas)){
                $this->posicion = $posicion;
            } else {
                echo "<br>La posicion '$posicion' no es válida. Solo es posible dar las siguientes posiciones:";
                foreach($posicionesPermitidas as $p){
                    echo "<br>\t-$p";
                }
            }
        }

        public function getPosicion(){
            return $this->posicion;
        }
    }
?>