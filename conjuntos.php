<?php

function conjuntos(array $arr1, array $arr2, bool $bool): array
{

    $resultado = array();

    // Validar que el bool sea verdadero o falso
    if ($bool) {
        foreach ($arr1 as $value) {
            // verificamos si $value está en el segundo array
            if (in_array($value, $arr2)) {
                $resultado[] = $value;
            }
        }
    } else {
        foreach ($arr1 as $value) {
            // verificamos si $value no está en el segundo array
            if (!in_array($value, $arr2)) {
                $resultado[] = $value;
            }
        }
    }
    return $resultado;
}

// Ejemplos de uso
$set1 = [1, 2, 3, 4, 5];
$set2 = [4, 5, 6, 7, 8];
$bool = true;

$resultado = conjuntos($set1, $set2, $bool);
echo "Los elementos son: " . implode(", ", $resultado) . "<br>";
