<?php
require_once "Articulo.php";
class ArticuloRevista extends Articulo {
    public function __construct($titulo, $contenido, $autor){
        $this->titulo = "Revista - " . $titulo;
        $this->contenido = $contenido;
        $this->autor = $autor;
    }
}
?>