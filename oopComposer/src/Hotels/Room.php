<?php 

namespace HotelAbc\Hotels;

class Room {
    private $id;
    private $price;
    private $hasViewToOcean;
    private $beds;
    public function __construct(
        $id, $price, $hasViewToOcean, $beds
    )
    {
        $this->id = $id;
        $this->price = $price;
        $this->hasViewToOcean = $hasViewToOcean;
        $this->beds = $beds;
    }

    public function getArray(){
        return [
            "id" => $this->id,
            "price" => $this->price,
            "hasViewToOcean" => $this->hasViewToOcean,
            "beds" => $this->beds
        ];   
    }
}