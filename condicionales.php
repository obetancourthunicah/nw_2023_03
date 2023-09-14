<?php
$nombre = "";
$mensaje = "";
$iteraciones = 0;

if (isset($_POST["btnEnviar"])) {
    $nombre = $_POST["nombre"];
    $iteraciones = intval($_POST["iteraciones"]);
    $mensaje = sprintf("Hola %s, Bienvenido" , $nombre);
} 

if (isset($_POST["btnEnviar2"])){
    $iteraciones = intval($_POST["iteraciones"]);
    switch ($iteraciones) {
        case 1:
            $mensaje = "Solamente 1";
            break;
        case 3:
            $mensaje = "Solamente 3";
            break;
        default:
            # code...
            $mensaje = ($iteraciones % 2) === 0 ? "Numero Par" : "Numero Impar" ;
            /* expresion boolean ? valor verdadero : valor falso; */
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condicionales</title>
</head>
<body>
    <h1>Condicionales y Ciclos</h1>
    <form action="condicionales.php" method="POST">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $nombre;  ?>" />
        <br>
        <label for="iteraciones">Iteraciones</label>
        <input type="number" name="iteraciones" id="iteraciones" value="<?php echo $iteraciones; ?>">
        <br>
        <button type="submit" name="btnEnviar">Enviar</button>
        <button type="submit" name="btnEnviar2">Enviar 2</button>
    </form>
    <?php
    if ($mensaje !== ""){
        for ($i = 0 ; $i < $iteraciones; $i++) {
            echo ($i + 1) . " " . $mensaje . '<br>';
        }
        $i = 0;
        while ($i < $iteraciones) {
            echo ($i + 1) . " " . $mensaje . ' (while)<br>';
            $i++;
        }
        /*
        do {
            ...expresiones
        } while (expresion);
        */
    }
    ?>
</body>
</html>