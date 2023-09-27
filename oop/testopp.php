<?php
require_once "Persona.php";

$personaInstance = new Persona(
    "Orlando",
    "Betancourth"
);

echo $personaInstance->sayHello();


?>