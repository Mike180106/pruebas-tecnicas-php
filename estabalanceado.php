<?php

/*
 * Crea un programa que comprueba si los paréntesis, llaves y corchetes
 * de una expresión están equilibrados.
 * - Equilibrado significa que estos delimitadores se abren y cieran
 *   en orden y de forma correcta.
 * - Paréntesis, llaves y corchetes son igual de prioritarios.
 *   No hay uno más importante que otro.
 * - Expresión balanceada: { [ a * ( c + d ) ] - 5 }
 * - Expresión no balanceada: { a * ( c + d ) ] - 5 }
 */


function estaBalanceado($expresion)
{
    $contenido = [];
    $simbolOpen = [
        "(" => ")",
        "[" => "]",
        "{" => "}"
    ];

    // str_split convierte una cadena en un array de caracteres
    foreach (str_split($expresion) as $simbol) {
        if (isset($simbolOpen[$simbol])) {
            // Si es un símbolo de apertura, lo agregamos al array
            array_push($contenido, $simbol);
        } else if (in_array($simbol, array_values($simbolOpen))) {
            // Si es un símbolo de cierre, verificamos si coincide con el último símbolo de apertura
            if (empty($contenido)) {
                return false; // Si no hay símbolos de apertura, la expresión no está balanceada
            }
            // array_pop elimina el último elemento del array y lo devuelve
            $ultimo = array_pop($contenido);
            if ($simbolOpen[$ultimo] !== $simbol) {
                return false; // Si no coincide, la expresión no está balanceada
            }
        }
    }
    // Si al final el array está vacío, la expresión está balanceada
    return empty($contenido);
}

// Ejemplo de uso
$exp1 = "{ [ a * ( c + d ) ] - 5 }";
$exp2 = "{ a * ( c + d ) ] - 5";

echo "La expresión '$exp1' " . (estaBalanceado($exp1) ? " está balanceada" : "no está balanceada") . "<br>";
echo "La expresión '$exp2' " . (estaBalanceado($exp2) ? "está balanceada" : "no está balanceada") . "\n";
