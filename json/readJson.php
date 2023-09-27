<?php

    $jsonString = file_get_contents('./prices.json');
    $precios = json_decode($jsonString, true);

    print_r($precios);
    foreach ($precios as $precio){
        echo '<br>';
        echo $precio["habitacion"];
        echo ' ';
        echo $precio["descripcion"];
    }
?>

