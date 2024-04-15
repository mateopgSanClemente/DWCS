<?php
    require_once "Participante.php";
    class Arbitro extends Participante{
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

    $arbitro1 = new Arbitro ("Ana", 34, 9);
    $arbitro2 = new Arbitro ("Santi", 45, 8);

    echo "<br>". $arbitro1->getNombre();
    $arbitro1->setNombre("Ana 2");
    echo "<br>". $arbitro1->getNombre();
    echo "<br>". $arbitro1->getEdad();
    $arbitro1->setEdad(99);
    echo "<br>". $arbitro1->getEdad();
    echo "<br>". $arbitro1->getAnhosTrabajando();
    $arbitro1->setAnhosTrabajando(200);
    echo "<br>". $arbitro1->getAnhosTrabajando();

    echo "<br>". $arbitro2->getNombre();
    $arbitro2->setNombre("Santi 2");
    echo "<br>". $arbitro2->getNombre();
    echo "<br>". $arbitro2->getEdad();
    $arbitro2->setEdad(99);
    echo "<br>". $arbitro2->getEdad();
    echo "<br>". $arbitro2->getAnhosTrabajando();
    $arbitro2->setAnhosTrabajando(300);
    echo "<br>". $arbitro2->getAnhosTrabajando();
?>