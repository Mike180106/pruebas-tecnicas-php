<?php

// Calcular el factorial de un número entero no negativo
function factorial(int $num)
{
    if ($num < 0) {
        return "Undefined for negative numbers";
    } elseif ($num === 0 || $num === 1) {
        return 1;
    } else {
        $result = 1;
        for ($i = 2; $i <= $num; $i++) {
            $result *= $i;
        }
        echo $result;
    }
}

// Example usage
echo factorial(5);
