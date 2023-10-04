<?php 

namespace HotelAbc\DAO;

class BookEntry {
    private function __construct()
    {
        
    }

    public static function createTableBookEntry(){
        $conn = Conn::getConn();
        $table = "bookentries";
        $createSQL = "CREATE TABLE IF NOT EXISTS bookentries (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            clientid INTEGER NOT NULL,
            roomid INTEGER NOT NULL,
            startDate TEXT NOT NULL,
            endDate TEXT NOT NULL,
            FOREIGN KEY (clientid) REFERENCES clients(id),
            FOREIGN KEY (roomid) REFERENCES rooms(id)
        )";
        $conn = Conn::getConn();
        $conn->exec($createSQL);
    }
    public static function createBookEntry (
        $clientid,
        $roomid,
        $startDate,
        $endDate
    ) {
        $conn = Conn::getConn();
        $insertSQL = "INSERT INTO bookentries (clientid, roomid, startDate, endDate) values (?, ?, ?, ?);";
        $prepared = $conn->prepare($insertSQL);
        $prepared->execute([
            $clientid,
            $roomid,
            $startDate,
            $endDate
        ]);
        return $conn->lastInsertId();
    }

    public static function getBookEntries(){
        $conn = Conn::getConn();
        $sqlstr = "SELECT * from bookentries";
        $rows = $conn->query($sqlstr, \PDO::FETCH_ASSOC);
        return $rows;
    }

    public static function getBookEntryById($id) {
        $conn = Conn::getConn();
        $sqlstr = "SELECT * from bookentries where id = :id";
        $prepared = $conn->prepare($sqlstr);
        $prepared->execute([':id' => $id]);
        $row = $prepared->fetch(\PDO::FETCH_ASSOC);
        return $row;
    }

    public static function getBookEntriesByClientId($id) {
        $conn = Conn::getConn();
        $sqlstr = "SELECT * from bookentries where clientid = :id";
        $prepared = $conn->prepare($sqlstr);
        $prepared->execute([':id' => $id]);
        $rows = $prepared->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }

    public static function getBookEntriesByRoomId($id) {
        $conn = Conn::getConn();
        $sqlstr = "SELECT * from bookentries where roomid = :id";
        $prepared = $conn->prepare($sqlstr);
        $prepared->execute([':id' => $id]);
        $rows = $prepared->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }

    public static function getBookEntriesByDate($startDate, $endDate) {
        $conn = Conn::getConn();
        $sqlstr = "SELECT * from bookentries where startDate <= :startDate AND endDate >= :endDate";
        $prepared = $conn->prepare($sqlstr);
        $prepared->execute([':startDate' => $startDate, ':endDate' => $endDate]);
        $rows = $prepared->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
    
    public static function validateRoomAvailability($startDate, $endDate) {
        $conn = Conn::getConn();
        $sqlstr = "SELECT * from rooms left join bookentries on bookentries.roomid = rooms.id and startDate <= :startDate AND endDate >= :endDate where bookentries.id is null";
        $prepared = $conn->prepare($sqlstr);
        $prepared->execute([':startDate' => $startDate, ':endDate' => $endDate]);
        $rows = $prepared->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
}