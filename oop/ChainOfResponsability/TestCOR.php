<?php
require_once "AuthChain.php";


$authChain = new AuthChain();

$credentialBasic = [
    "email" => "admin@admin.com",
    "password" => "12345678"
];

$credentialGeo = [
    "lat" => "123412341234",
    "lon" => "asdfasdfasdfa"
];

$credentialJwt = [
    "Bearer" => "Bearer asdfao9900293409asdf9a09i09132090adfasd0f0"
];

echo sprintf(
    "Verificando Basic Node: %s <hr>",
    $authChain->validate($credentialBasic)
);

echo sprintf(
    "Verificando Jwt Node: %s <hr>",
    $authChain->validate($credentialJwt)
);

echo sprintf(
    "Verificando Geo Node: %s <hr>",
    $authChain->validate($credentialGeo)
);

echo sprintf(
    "Verificando None Node: %s",
    $authChain->validate([])
);

?>