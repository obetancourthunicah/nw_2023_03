<?php

namespace HotelAbc\Hotels;

class Hotel {
    private $name;

    public function __construct()
    {
        $this->name= "Hotel ABC";
    }
    public function saludar() {
        return "Hola desde ". $this->name;
    }
}