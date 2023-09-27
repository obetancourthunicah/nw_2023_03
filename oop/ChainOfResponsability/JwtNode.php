<?php
require_once "Node.php";

class JwtNode extends Node{
    public function __construct($next = null){
        if($next){
            $this->setNextNode($next);
        }
    }

    public function validate($credential)
    {
       $jwt = isset($credential["Bearer"]) ? explode(" ", $credential["Bearer"])[1] : null;
       if ($jwt) {
            return true;
       }
       return parent::validate($credential);
    }
}
?>