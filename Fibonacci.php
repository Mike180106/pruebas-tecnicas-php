<?php
/*
 * Escribe un programa que imprima los 50 primeros números de la sucesión
 * de Fibonacci empezando en 0.
 * - La serie Fibonacci se compone por una sucesión de números en
 *   la que el siguiente siempre es la suma de los dos anteriores.
 *   0, 1, 1, 2, 3, 5, 8, 13...
 */

function Fibonacci(): array
{
    $result = array(0, 1);
    for ($i = 2; $i < 50; $i++) {
        $result[] = $result[$i - 1] + $result[$i - 2];
    }

    return $result;
}

$Resultado = Fibonacci();
foreach ($Resultado as $value) {
    echo $value . " ";
}
