<?php 

namespace HotelAbc\Hotels;

class RoomAdapter {
    public static function fromArrayToRoom(
        $roomArray
    ){
        return new Room(
            $roomArray["id"],
            $roomArray["price"],
            $roomArray["hasViewToOcean"],
            $roomArray["beds"]
        );
    }

    public static function fromArrayRowsToRooms(
        $roomsArray
    ){
        $resultObjectArray = [];
        foreach($roomsArray as $roomArray) {
            $resultObjectArray[] = self::fromArrayToRoom($roomArray);
        }
        return $resultObjectArray;
    }
}