<?php

// Realizar prueba FizzBuzz

// Escribe un programa que imprima los números del 1 al 100. Pero por los múltiplos de tres imprime "Fizz" en lugar del número
// y por los múltiplos de cinco imprime "Buzz". Para los números que son múltiplos de ambos imprime "FizzBuzz".


function fizzBuzz()
{
    $result = array();
    for ($i = 1; $i <= 100; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            $result[] = "FizzBuzz";
        } else if ($i % 3 == 0) {
            $result[] = "Fizz";
        } else if ($i % 5 == 0) {
            $result[] = "buzz";
        } else {
            $result[] = $i;
        }
    }
    return $result;
}

$Resultado = fizzBuzz();
foreach ($Resultado as $value) {
    echo $value . " ";
}
