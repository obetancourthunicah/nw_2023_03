<?php 

namespace HotelAbc\DAO;

class Client {
    private function __construct()
    {
        
    }
    public static function createTableClient(){
        $conn = Conn::getConn();
        $table = "clients";
        $createSQL = "CREATE TABLE IF NOT EXISTS clients (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT NOT NULL,
            email TEXT NOT NULL,
            dni TEXT NOT NULL
        )";
        $conn = Conn::getConn();
        $conn->exec($createSQL);
    }
    public static function createClient(
        $username,
        $email,
        $dni
    ) {
        $conn = Conn::getConn();
        $insertSQL = "INSERT INTO clients (username, email, dni) values (?, ?, ?);";
        $prepared = $conn->prepare($insertSQL);
        $prepared->execute([
            $username,
            $email,
            $dni
        ]);
        return $conn->lastInsertId();
    }

    public static function getClients(){
        $conn = Conn::getConn();
        $sqlstr = "SELECT * from clients";
        $rows = $conn->query($sqlstr, \PDO::FETCH_ASSOC);
        return $rows;
    }
    public static function getClientById($id) {
        $conn = Conn::getConn();
        $sqlstr = "SELECT * from clients where id = :id";
        $prepared = $conn->prepare($sqlstr);
        $prepared->execute([':id' => $id]);
        $row = $prepared->fetch(\PDO::FETCH_ASSOC);
        return $row;
    }

}