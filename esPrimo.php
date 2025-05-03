<?php

/*
 * Escribe un programa que se encargue de comprobar si un número es o no primo.
 * Hecho esto, imprime los números primos entre 1 y 100.
 */

function esPrimo(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= $number; $i++) {
        if ($number % $i == 0) {
            if ($i != $number && $i != 1) {
                return false;
            }
        }
    }
    return true;
}

for ($i = 1; $i <= 100; $i++) {
    if (esPrimo($i)) {
        echo $i . " ";
    }
}
