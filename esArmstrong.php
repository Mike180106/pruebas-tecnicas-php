<?php

/*
 * Escribe una función que calcule si un número dado es un número de Armstrong
 * (o también llamado narcisista).
 * Si no conoces qué es un número de Armstrong, debes buscar información
 * al respecto.
 */


function esArmstrong(int $num): bool
{
    $suma = 0;
    $numArr = str_split((string)$num);
    $count = count($numArr);

    foreach ($numArr as $digito) {
        $suma += potencia((int) $digito, $count);
    }

    return $suma === $num;
}

function potencia($base, $exponente)
{
    $resultado = 1;
    for ($i = 0; $i < $exponente; $i++) {
        $resultado *= $base;
    }
    return $resultado;
}

// Ejemplo de uso
echo esArmstrong(153) ? "Es un número de Armstrong" : "No es un número de Armstrong";
