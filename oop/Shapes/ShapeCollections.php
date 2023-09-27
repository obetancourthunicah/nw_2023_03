<?php 

class ShapeCollection {
    private $shapes;

    public function __construct(){
        $this->shapes = array();
    }
    public function addShape(IShape $shape){
        $this->shapes[] = $shape;
    }

    public function getAllAreas(){
        $areaTotal = 0;
        foreach($this->shapes as $shape) {
            $areaTotal += $shape->area();
        }
        return $areaTotal;
    }
}
?>