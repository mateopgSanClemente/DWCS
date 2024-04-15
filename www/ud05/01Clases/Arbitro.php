<?php
class Jugador extends Participante{
    private int $anhosTrabajando;

    public function __construct(string $nombre, int $edad, int $anhosTrabajando){
        if($anhosTrabajando>=0){
            parent::__construct($nombre, $edad);
            $this->anhosTrabajando = $anhosTrabajando;
        } else {
            echo "El valor introducido para los años trabajados no es correcta, debe ser 0 o superior.";
        }
    }

    public function setAnhosTrabajando(int $anhosTrabajando){
        if($anhosTrabajando>=0){
            $this->anhosTrabajando = $anhosTrabajando;
        } else {
            echo "El valor introducido para los años trabajados no es correcta, debe ser 0 o superior.";
        }
    }

    public function getAnhosTrabajando(){
        return $this->anhosTrabajando;
    }
}
?>