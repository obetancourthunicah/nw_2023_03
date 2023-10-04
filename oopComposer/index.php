<?php

use HotelAbc\Clients\Booking;
use HotelAbc\Clients\Client;
use HotelAbc\DAO\BookEntry;
use HotelAbc\DAO\Client as DAOClient;
use HotelAbc\DAO\Room;

require_once "vendor/autoload.php";
session_start();
$isClientRegistered = false;
$txtNombre = '';
$txtDni = '';
$txtEmail = '';
$clientId = 0;
$client = new Client('', '', '', 0);

$cmbRoom = 0;
$txtStartDate = date("YMd");
$txtEndDate = date_add(new DateTime(), DateInterval::createFromDateString("3 days"))->format("YMd");

if (isset($_SESSION["cliente"])) {
    $isClientRegistered = true;
    $txtNombre = $_SESSION["cliente"]["username"];
    $txtEmail = $_SESSION["cliente"]["email"];
    $txtDni = $_SESSION["cliente"]["dni"];
    $clientId = $_SESSION["cliente"]["id"];
    $client = new Client(
        $txtNombre,
        $txtEmail,
        $txtDni,
        $clientId
    );
}

if (isset($_POST["btnRegistrarCliente"])) {
    $txtNombre = $_POST["txtNombre"];
    $txtEmail = $_POST["txtEmail"];
    $txtDni = $_POST["txtDni"];

    $dbClient = DAOClient::getClientByEmail($txtEmail);
    if ($dbClient) {
        $client = new Client(
            $dbClient["username"],
            $dbClient["email"],
            $dbClient["dni"],
            $dbClient["id"]
        );
    } else {
        $clienteId = DAOClient::createClient(
            $txtNombre,
            $txtEmail,
            $txtDni
        );
        $client = new Client(
            $txtNombre,
            $txtEmail,
            $txtDni,
            $clientId
        );
    }

    $_SESSION["cliente"] = array();
    $_SESSION["cliente"]["username"] = $txtNombre;
    $_SESSION["cliente"]["email"] = $txtEmail;
    $_SESSION["cliente"]["dni"] = $txtDni;
    $_SESSION["cliente"]["id"] = $client->getId();
}

$rooms = Room::getRooms();

if (isset($_POST["btnOrder"])){
    $cmbRoom = $_POST["cmbRoom"];
    $txtStartDate = $_POST["txtStartDate"];
    $txtEndDate = $_POST["txtEndDate"];

    BookEntry::createBookEntry(
        $clientId,
        $cmbRoom,
        $txtStartDate,
        $txtEndDate
    );
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (!$isClientRegistered) { ?>
        <section>
            <h1>Crear Cliente</h1>
            <form action="index.php" method="post">
                <label for="txtNombre">Nombre</label>
                <input type="text" required name="txtNombre" id="txtNombre" placeholder="Nombre Completo" value="<?php echo $txtNombre; ?>" />
                <br />
                <label for="txtDni">Identidad</label>
                <input type="text" required name="txtDni" id="txtDni" placeholder="Identidad" value="<?php echo $txtDni; ?>" />
                <br />
                <label for="email">Correo Electronico</label>
                <input type="email" required name="txtEmail" id="email" placeholder="Nombre Completo" value="<?php echo $txtEmail; ?>" />
                <br />
                <button type="submit" name="btnRegistrarCliente">Registrar</button>
            </form>
        </section>
    <?php } else { ?>
        <div>
            <div><?php echo $txtNombre; ?> </div>
            <div><?php echo $txtEmail; ?> </div>
            <div><?php echo $txtDni; ?> </div>
        </div>
        <section>
            <h1>Registrar Orden</h1>
            <form action="index.php" method="post">
                <label for="txtStartDate">Fecha de Inicio</label>
                <input type="datetime-local" name="txtStartDate" id="txtStartDate" value="<?php echo $txtStartDate; ?>" />
                <br/>
                <label for="txtEndDate">Fecha Final</label>
                <input type="datetime-local" name="txtEndDate" id="txtEndDate" value="<?php echo $txtEndDate; ?>" />
                <br/>
                <label for="cmbRoom">Habitacion</label>
                <select name="cmbRoom" id="cmbRoom" >
                    <?php 
                        foreach ($rooms as $room){

                            echo sprintf(
                                '<option value="%s" %s>(%s) with view: %s beds: %s price: %s</option>', 
                                    $room["id"],
                                    ($room["id"] === $cmbRoom)? "selected": "",
                                    $room["id"],
                                    $room["hasviewtoocean"] && true ? "Si": "No",
                                    $room["beds"],
                                    $room["price"]
                            );
                        }
                    ?>
                </select>
                <br/>
                <button type="submit" name="btnOrder"> Ordenar </button>
            </form>
        </section>
    <?php } ?>



</body>

</html>