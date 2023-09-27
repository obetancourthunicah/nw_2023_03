<?php
require_once "IShape.php";

class Circle implements IShape {
    private $radius;
    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area():float {
        return $this->radius^2*pi();
    }

    public function perimeter():float {
        return 2 * pi() * $this->radius;
    }
}

?>