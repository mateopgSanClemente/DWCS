<?php
    class Usuario {
        private $nombre;
        private $apellidos;
        private $edad;
        private $provincia;
        private $password;

        public function __construct($nombre, $apellidos, $edad, $provincia, $password){
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->edad = $edad;
            $this->provincia = $provincia;
            $this->password = $password;
        }

        public function getNombre(){
            return $this->nombre;
        }
        public function getApellidos(){
            return $this->apellidos;
        }
        public function getEdad(){
            return $this->edad;
        }
        public function getProvincia(){
            return $this->provincia;
        }
        public function getPassword(){
            return $this->password;
        }
        /*Getter y setter a través de los método mágicos __set() y __get()
        public function __get($propiedad){
            if(property_exists($this, $propiedad)){
                return $this->$propiedad;
            } else {
                echo "La propiedad $propiedad no existe.";
            }
        }

        public function __set($propiedad, $valor){
            if(property_exists($this, $propiedad)){
                $this->$propiedad = $valor;
            } else {
                echo "La propiedad $propiedad no existe en la clase " . __CLASS__;
            }
        }
        */
    }
?>