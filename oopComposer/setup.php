<?php

use HotelAbc\DAO\BookEntry;
use HotelAbc\DAO\Client;

require_once "vendor/autoload.php";

Client::createTableClient();
BookEntry::createTableBookEntry();
?>