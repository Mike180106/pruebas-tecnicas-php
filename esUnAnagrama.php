<?php

/*
 * Escribe una función que reciba dos palabras (String) y retorne
 * verdadero o falso (Bool) según sean o no anagramas.
 * - Un Anagrama consiste en formar una palabra reordenando TODAS
 *   las letras de otra palabra inicial.
 * - NO hace falta comprobar que ambas palabras existan.
 * - Dos palabras exactamente iguales no son anagrama.
 */

// Creamos la función

function esUnAnagrama(string $word1, string $word2): bool
{
    // Convertimos ambas palabras en minusculas y eliminamos los espacios
    $word1 = mb_strtolower(str_replace(' ', '', $word1));
    $word2 = mb_strtolower(str_replace(' ', '', $word2));

    // Comprobamos que las palabras no sean iguales 
    if ($word1 === $word2) {
        return false;
    }

    // Convertimos las palabras en arrays de caracteres
    $word1Array = str_split($word1);
    $word2Array = str_split($word2);

    // Ordenamos los arrays
    // sort() ordena los elementos de un array en orden ascendente
    sort($word1Array);
    sort($word2Array);

    // Comparamos los arrays
    return $word1Array === $word2Array;
}

// Probamos la función
$word1 = "amor";
$word2 = "roma";
$result = esUnAnagrama($word1, $word2) ? "Son anagramas" : "No son anagramas";
echo "$word1 y $word2: $result";
