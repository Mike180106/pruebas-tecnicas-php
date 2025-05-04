<?php

/*
 * Crea una función que ordene y retorne una matriz de números.
 * - La función recibirá un listado (por ejemplo [2, 4, 6, 8, 9]) y un parámetro
 *   adicional "Asc" o "Desc" para indicar si debe ordenarse de menor a mayor
 *   o de mayor a menor.
 * - No se pueden utilizar funciones propias del lenguaje que lo resuelvan
 *   automáticamente.
 */


function ordenaLista(array $lista, string $orden): array
{
    $orden = mb_strtolower($orden); // Convertir el orden a minúsculas para evitar problemas de mayúsculas/minúsculas

    // Validar que el orden sea "asc" o "desc"
    if ($orden !== "asc" && $orden !== "desc") {
        throw new InvalidArgumentException("El parámetro 'orden' debe ser 'asc' o 'desc'.");
    }

    $n = count($lista);

    // Implementación del algoritmo Bubble Sort
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            // Comparar elementos según el orden
            if (
                ($orden === "asc" && $lista[$j] > $lista[$j + 1]) ||
                ($orden === "desc" && $lista[$j] < $lista[$j + 1])
            ) {
                // Intercambiar elementos
                $temp = $lista[$j];
                $lista[$j] = $lista[$j + 1];
                $lista[$j + 1] = $temp;
            }
        }
    }

    return $lista;
}

// Ejemplo de uso
$lista = [5, 2, 9, 1, 5, 6];
echo "Orden ascendente: " . implode(", ", ordenaLista($lista, "asc")) . "\n";
echo "Orden descendente: " . implode(", ", ordenaLista($lista, "desc")) . "\n";
