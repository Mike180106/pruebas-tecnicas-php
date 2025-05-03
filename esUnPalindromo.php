<?php

/*
 * Escribe una función que reciba un texto y retorne verdadero o
 * falso (Boolean) según sean o no palíndromos.
 * Un Palíndromo es una palabra o expresión que es igual si se lee
  * de izquierda a derecha que de derecha a izquierda.
 * NO se tienen en cuenta los espacios, signos de puntuación y tildes.
 * Ejemplo: Ana lleva al oso la avellana.
 */

function  esUnPalindromo($text): bool
{

    $text = eliminarTildes($text);
    $text = str_split(preg_replace('/[^a-zA-Z0-9]/', '', mb_strtolower($text)));

    $textInvertido = array_reverse($text);

    if ($text == $textInvertido) {
        return true;
    } else {
        return false;
    }
}

function eliminarTildes($text)
{
    $text = str_replace('á', 'a', $text);
    $text = str_replace('é', 'e', $text);
    $text = str_replace('í', 'i', $text);
    $text = str_replace('ó', 'o', $text);
    $text = str_replace('ú', 'u', $text);
    return $text;
}

$text = "Ana lleva al oso la avellana";

$palindromo = esUnPalindromo($text);
if ($palindromo) {
    echo "El texto '$text' es un palíndromo.";
} else {
    echo "El texto '$text' no es un palíndromo.";
}
