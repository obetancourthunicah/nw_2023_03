<?php

namespace HotelAbc\DAO;

class Room
{
    private function __construct()
    {
    }
    public static function createTable()
    {
        $table = "rooms";
        $createSQL = "CREATE TABLE IF NOT EXISTS rooms (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            price REAL NOT NULL,
            hasviewtoocean INTEGER NOT NULL,
            beds INTEGER NOT NULL
        )";
        $conn = Conn::getConn();
        $conn->exec($createSQL);
    }
    public static function poblateTable()
    {
        $insertSQL = "INSERT INTO rooms (price, hasviewtoocean, beds) values (?, ?, ?);";
        $conn = Conn::getConn();
        $prepared = $conn->prepare($insertSQL);
        $arr = [
            [80.00, 1, 2],
            [80.00, 0, 2],
            [90.00, 0, 3],
            [90.00, 1, 2],
            [180.00, 1, 4]
        ];
        foreach ($arr as &$roomData) {
            $prepared->execute(
                $roomData
            );
        }
    }

    public static function getRooms () {
        $conn = Conn::getConn();
        $strsql = "SELECT * from rooms;";
        $rows = $conn->query($strsql, \PDO::FETCH_ASSOC);
        return $rows;
    }

    public static function getRoomById($id){
        $conn = Conn::getConn();
        $strsql = "SELECT * from rooms where id = :id;";
        $prepare = $conn->prepare($strsql);
        $prepare->execute([":id" => $id] );
        $rows = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        if (count($rows)){
            return $rows[0];
        }
        return [];

    }
}
