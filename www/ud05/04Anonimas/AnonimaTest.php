<?php
$base = 20;
$altura = 50;
$claseAnonima = new class ($base, $altura){
    private int $base;
    private int $altura;
    public function __construct($base, $altura){
        $this->base = $base;
        $this->altura = $altura;
    }
    public function area(){
        return ($this->base * $this->altura)/2;
    }
    public function perimetro(){
        return $this->base * 2 + $this->altura * 2;
    }
};

echo $claseAnonima->area() . "<br>";
echo $claseAnonima->perimetro();
?>