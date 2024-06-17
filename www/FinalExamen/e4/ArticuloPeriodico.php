<?php
require_once "Articulo.php";
class ArticuloPeriodico extends Articulo {
    public function __construct($titulo, $contenido, $autor){
        $this->titulo = "Periodico - " . $titulo;
        $this->contenido = $contenido;
        $this->autor = $autor;
    }
}