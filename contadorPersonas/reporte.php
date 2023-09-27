<?php
require_once 'libreria.php';

$contadores = obtenerArregloSession();
$totalTotal = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Reporte de Contadores
    </h1>
    <table>
        <thead>
            <tr>
                <th>Horario</th>
                <th>entradas</th>
                <th>salidas</th>
                <th>total</th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach ($contadores as $contador) { ?>
            <tr>
                <td><?php echo $contador["diahora"]; ?></td>
                <td><?php echo $contador["entradas"]; ?></td>
                <td><?php echo $contador["salidas"]; ?></td>
                <td><?php 
                    echo $contador["total"];
                    $totalTotal +=  $contador["total"];
                ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">
                    <?php echo $totalTotal;  echo date("YmdHis");?>
                </td>
            </tr>
        </tfoot>
    </table>
</body>
</html>