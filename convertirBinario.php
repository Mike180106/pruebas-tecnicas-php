<?php


/*
 * Crea un programa que convierta un número decimal a binario.
 * - No se pueden utilizar funciones propias del lenguaje que
 *   lo resuelvan automáticamente.
 */

function convertirABinario(int $number)
{
    $resultado = '';

    while ($number > 0) {
        // Concatenar el residuo al resultado al lado izquierdo
        // para que el número binario se forme correctamente
        $resultado = $number % 2 . $resultado;
        $number = (int)($number / 2);
    }
    echo $resultado;
}

// Ejemplo de uso
convertirABinario(10);
