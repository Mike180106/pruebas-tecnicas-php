<?php

/*
 * Crea un programa que determine si dos vectores son ortogonales.
 * - Los dos array deben tener la misma longitud.
 * - Cada vector se podría representar como un array. Ejemplo: [1, -2]
 */


// Verificamos que los vectores tengan la misma longitud
function verficarArray(array $arr1, array $arr2)
{
    if ((count($arr1) != 2) || (count($arr2) != 2)) {
        return false;
    }

    return true;
}

function vectoresOrtogonales(array $arr1, array $arr2): string
{
    if (!verficarArray($arr1, $arr2)) {
        return "Error: Los vectores no son válidos.";
    }

    // Revisamos que los vectores sean ortogonales

    $productoEscalar = ($arr1[0] * $arr2[0] + $arr1[1] * $arr2[1]);

    if ($productoEscalar == 0) {
        return "Los vectores son ortogonales.";
    } else {
        return "Los vectores no son ortogonales.";
    }
}

// Ejemplo de uso
$arr1 = [1, 2];
$arr2 = [-2, 1];
echo vectoresOrtogonales($arr1, $arr2) . "<br>";

$arr1 = [1, 2, 3];
$arr2 = [4, 5, 6];
echo vectoresOrtogonales($arr1, $arr2) . "<br>";
