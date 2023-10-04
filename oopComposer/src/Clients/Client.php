<?php 

namespace HotelAbc\Clients;

class Client {
    private $username;
    private $email;
    private $dni;
    private $id;

    public function __construct(
        $username,
        $email,
        $dni,
        $id
    )
    {
        $this->username = $username;
        $this->email = $email;
        $this->dni = $dni;
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }
}