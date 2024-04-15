<?php
    class Participante {
        private string $nombre;
        private int $edad;

        public function __construct(string $nombre, int $edad){
            $this->nombre = $nombre;
            $this->edad = $edad;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getEdad(){
            return $this->edad;
        }

        public function setNombre(string $nombre){
            $this->nombre = $nombre;
        }

        public function setEdad(int $edad){
            $this->edad = $edad;
        }
    }
?>