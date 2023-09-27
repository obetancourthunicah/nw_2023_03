<?php
require_once "Node.php";

class GeoNode extends Node{
    public function __construct($next=null)
    {
        if($next){
            $this->setNextNode($next);
        }
    }
    public function validate($credential)
    {
        $lat = isset($credential["lat"]) ? $credential["lat"] : null;
        $lon = isset($credential["lon"]) ? $credential["lon"] : null;

        if($lat && $lon){
            return true;
        }
        return parent::validate($credential);
    }
}

?>