<?php
require_once 'IShape.php';
class Triangles implements IShape {
    private $altura;
    private $base;

    public function __construct($altura, $base)
    {
        $this->altura = $altura;
        $this->base = $base;
    }
    public function area():float {
        return ($this->base * $this->altura) / 2;
    }

    public function perimeter(): float
    {
        return (sqrt(($this->base / 2 ) ^ 2 + ($this->altura) ^2) * 2) + $this->base ;
    }

}

?>