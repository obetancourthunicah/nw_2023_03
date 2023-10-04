<?php
require_once "vendor/autoload.php";

use HotelAbc\DAO\Room as DAORoom;
use HotelAbc\Hotels\Hotel;

$hotelInstance = new Hotel();

DAORoom::poblateTable();

// echo $hotelInstance->saludar();

