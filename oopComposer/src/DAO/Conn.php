<?php 

namespace HotelAbc\DAO;

use PDO; 

class Conn {
    //Singleton
    private static $conn = null;

    private function __construct()
    {
        //Hack para evitar que no se instancie la clase
    }

    public static function getConn() {
        $dbfile = "hoteldb.db";
        if (!self::$conn) {
            self::$conn = new PDO('sqlite:'.$dbfile);
        }
        return self::$conn;
    }
}