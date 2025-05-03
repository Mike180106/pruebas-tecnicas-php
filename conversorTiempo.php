<?php

function convertirMilisegundos(int $dias, int $horas, int $minutos, int $segundos)
{
    // Validar que los parámetros sean enteros no negativos
    if ($dias < 0 || $horas < 0 || $minutos < 0 || $segundos < 0) {
        echo "Error: Todos los parámetros deben ser enteros no negativos.";
        return;
    }
    // Convertir a milisegundos
    $milisegundos = ($dias * 24 * 60 * 60 * 1000) + ($horas * 60 * 60 * 1000) + ($minutos * 60 * 1000) + ($segundos * 1000);
    echo "La cantidad de milisegundos son: " . $milisegundos;
}

// Ejemplos de uso 
convertirMilisegundos(1, 2, 3, 4);
echo "<br>";
