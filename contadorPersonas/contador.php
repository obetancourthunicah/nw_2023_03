<?php
require_once "libreria.php";

if(isset($_POST["btnIn"])){
    ingresaPersona();
}

if(isset($_POST["btnOut"])){
    salidaPersona();
}
if(isset($_POST["btnPrcCuentas"])){
    $texto = $_POST["cuentas"];
    $cuentas = explode(" ", $texto);
    print_r($cuentas);
    die();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Personas</title>
</head>
<body>
    <h1>Contador de Personas</h1>
    <form action="contador.php" method="post">
        <button type="submit" name="btnIn">Ingresa</button>
        &nbsp;
        <button type="submit" name="btnOut">Salida</button>
    </form>


    <form action="contador.php" method="post">
        <textarea id="cuentas" name="cuentas"></textarea>
        <button type="submit" name="btnPrcCuentas">Procesar Cuentas</button>
    </form>
    
</body>
</html>