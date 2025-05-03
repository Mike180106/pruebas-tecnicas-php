<?php

/*
 * Crea dos funciones, una que calcule el máximo común divisor (MCD) y otra
 * que calcule el mínimo común múltiplo (mcm) de dos números enteros.
 * - No se pueden utilizar operaciones del lenguaje que
 *   lo resuelvan directamente.
 */

// Función para calcular el MCD (Máximo Común Divisor)
function mcd($a, $b)
{
    $a = abs($a);
    $b = abs($b);

    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

// Función para calcular el mcm (Mínimo Común Múltiplo)
function mcm($a, $b)
{
    return abs($a * $b) / mcd($a, $b);
}

// Ejemplo de uso
echo "MCD(24, 36): " . mcd(24, 36) . "\n";   // 12
echo "mcm(24, 36): " . mcm(24, 36) . "\n";   // 72
