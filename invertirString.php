<?php

/*
 * Crea un programa que invierta el orden de una cadena de texto
 * sin usar funciones propias del lenguaje que lo hagan de forma automática.
 * - Si le pasamos "Hola mundo" nos retornaría "odnum aloH"
 */

function invertirString(string $word)
{
    $stringInvertido = "";
    $longitud = mb_strlen($word);
    for ($i = $longitud - 1; $i >= 0; $i--) {
        $stringInvertido .= $word[$i];
    }

    return $stringInvertido;
}

$word = "Hola Mundo";
$wordInvertido = invertirString($word);
echo "La palabra invertida es: " . $wordInvertido . "<br>";
