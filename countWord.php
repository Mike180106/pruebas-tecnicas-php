<?php

/*
 * Crea un programa que cuente cuantas veces se repite cada palabra
 * y que muestre el recuento final de todas ellas.
 * - Los signos de puntuación no forman parte de la palabra.
 * - Una palabra es la misma aunque aparezca en mayúsculas y minúsculas.
 * - No se pueden utilizar funciones propias del lenguaje que
 *   lo resuelvan automáticamente.
 */

function countWords(string $text)
{
    $resultado = [];
    $palabra = '';
    $long = strlen($text);

    for ($i = 0; $i <= $long; $i++) {

        // Si $i es menor que $long, entonces $c es el caracter en la posición $i de $text
        // Si $i es igual a $long, entonces $c es un espacio en blanco
        $c = $i < $long ? $text[$i] : ' ';

        // ctype_alnum($c) devuelve true si $c es un caracter alfanumérico (letra o número)
        if (ctype_alnum($c)) {
            //Convertimos el caracter a minúscula
            $palabra .= strtolower($c);
        } else {
            // Si $c no es un caracter alfanumérico, entonces hemos llegado al final de una palabra
            if ($palabra !== '') {
                // Si la palabra no existe en el array $tresultado la inicializamos a 0
                if (!isset($resultado[$palabra])) {
                    // La inicializamos a 0
                    $resultado[$palabra] = 0;
                }
                // Incrementamos el contador de la palabra
                $resultado[$palabra]++;

                $palabra = '';
            }
        }
    }
    return $resultado;
}

// Ejemplo de uso
$text = "Hola, soy michael y soy un programador. Soy programador desde hace 10 años. 
Me gusta programar en PHP, Java y Python. Me gusta programar en PHP, Java y Python.";

$resultado = countWords($text);

echo "<h1>Contador de palabras</h1>";
echo "<h2>Texto: </h2>";
echo "<p>{$text}</p>";

foreach ($resultado as $palabra => $contador) {
    echo " '{$palabra}' => '{$contador}' <br>";
}
