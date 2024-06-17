<?php
require_once "Imprimible.php";
class Articulo implements Imprimible{
    protected $titulo;
    protected $contenido;
    protected $autor;
    //el constructor apropiado para dar valores a los atributos.
    public function __construct ($titulo, $contenido, $autor){
        $this->titulo = $titulo;
        $this->contenido = $contenido;
        $this->autor = $autor;
    }
    //Getters
    public function getTitulo(){
        return $this->titulo;
    }
    public function getContenido(){
        return $this->contenido;
    }
    public function getAutor(){
        return $this->autor;
    }
    //Setters
    public function setTitulo($nombre){
        $this->nombre = $nombre;
    }
    public function setContenido($contenido){
        $this->nombre = $contenido;
    }
    public function setAutor($autor){
        $this->nombre = $autor;
    }

    public function imprimirEnTabla () {
        $string = "<table><tr><td>" . $this->titulo . "</td><td>" . $this->contenido . "</td><td>" . $this->autor . "</td></tr></table>";
        return $string;
    }

    public function imprimirEnLista(){
        $string = "<ul><li>" . $this->titulo . "</li><li>" . $this->contenido . "</li><li>" . $this->autor . "</li></ul>";
        return $string;
    }
}