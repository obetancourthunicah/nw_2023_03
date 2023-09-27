<?php
require_once "Node.php";

class BasicNode extends Node{
    public function __construct($next = null){
        if($next){
            $this->setNextNode($next);
        }
    }

    public function validate($credential)
    {
        $email = isset($credential["email"]) ? $credential["email"]: null;
        $password =  isset($credential["password"]) ? $credential["password"]: null;

        if ($email === "admin@admin.com" && $password === "12345678") {
            return true;
        }
        return parent::validate($credential);
    }
}
