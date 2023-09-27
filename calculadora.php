<?php 
$operando1 = 0;
$operando2 = 0;
$resultado = 0;
$resultadoMsg = "";

if(isset($_POST["suma"])) {
    $operando1 = floatval($_POST["operando1"]);
    $operando2 = floatval($_POST["operando2"]);
    $resultado = $operando1 + $operando2;
    $resultadoMsg = sprintf(
        'La suma de  %.2f y %.2f es igual a %.2f',
        $operando1,
        $operando2,
        $resultado
    );
}

if(isset($_POST["resta"])) {
    $operando1 = floatval($_POST["operando1"]);
    $operando2 = floatval($_POST["operando2"]);
    $resultado = $operando1 - $operando2;
    $resultadoMsg = sprintf(
        'La resta de  %.2f y %.2f es igual a %.2f',
        $operando1,
        $operando2,
        $resultado
    );
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculador Simple</title>
</head>
<body>
    <h1>Calculadora Simple</h1>
    <form action="calculadora.php" method="post">
        <label for="operando1">Primer Numero</label>
        <input type="number" step="0.5" name="operando1" id="operando1" value="<?php echo $operando1; ?>">
        <br>
        <label for="operando2">Segundo Numero</label>
        <input type="number" name="operando2" id="operando2" value="<?php echo $operando2; ?>">
        <br>
        <fieldset>
            <button type="submit" name="suma">Sumar</button>
            <button type="submit" name="resta">Restar</button>
            <button type="submit" name="mult">Multiplicar</button>
            <button type="submit" name="div">Dividir</button>
        </fieldset>
    </form>
    <?php
        if ($resultadoMsg!=="" ) {
            echo '<section>' . $resultadoMsg . '</section>';
        }
    ?>
</body>
</html>