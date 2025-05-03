<?php

/*
 * Crea una función que reciba dos cadenas como parámetro (str1, str2)
 * e imprima otras dos cadenas como salida (out1, out2).
 * - out1 contendrá todos los caracteres presentes en la str1 pero NO
 *   estén presentes en str2.
 * - out2 contendrá todos los caracteres presentes en la str2 pero NO
 *   estén presentes en str1.
 */

function printText(string $str1, string $str2)
{
    $mostrar1 = eliminateCaracter($str1, $str2);
    $mostrar2 = eliminateCaracter($str2, $str1);

    echo "De la cadena '$str1' quedaron los siguientes caracteres: $mostrar1 <br>";
    echo "De la cadena '$str2' quedaron los siguientes caracteres: $mostrar2\n";
}

function eliminateCaracter(string $str1, string $str2)
{
    // str_split() convierte la cadena en un array de caracteres
    // array_unique() elimina los caracteres duplicados
    $set1 = array_unique(str_split(mb_strtolower($str1)));
    $set2 = array_unique(str_split(mb_strtolower($str2)));

    $out = '';

    foreach ($set1 as $char) {
        if (!in_array($char, $set2)) { // Si el caracter no está en el segundo array set2, lo añadimos a la salida
            $out .= $char;
        }
    }
    return $out;
}


// Ejemplo de uso
$str1 = "Hola Mundo, soy mike";
$str2 = "Hola Mundo, soy juan";

printText($str1, $str2);
