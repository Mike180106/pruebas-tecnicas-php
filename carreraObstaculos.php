<?php
/*
 * Crea una función que evalúe si un/a atleta ha superado correctamente una
 * carrera de obstáculos.
 * - La función recibirá dos parámetros:
 *      - Un array que sólo puede contener String con las palabras
 *        "run" o "jump"
 *      - Un String que represente la pista y sólo puede contener "_" (suelo)
 *        o "|" (valla)
 * - La función imprimirá cómo ha finalizado la carrera:
 *      - Si el/a atleta hace "run" en "_" (suelo) y "jump" en "|" (valla)
 *        será correcto y no variará el símbolo de esa parte de la pista.
 *      - Si hace "jump" en "_" (suelo), se variará la pista por "x".
 *      - Si hace "run" en "|" (valla), se variará la pista por "/".
 * - La función retornará un Boolean que indique si ha superado la carrera.
 * Para ello tiene que realizar la opción correcta en cada tramo de la pista.
 */

function checkValues(array $atleta, string $pista)
{
    // Verificamos que el array solo contenga "run" o "jump"
    foreach ($atleta as $accion) {
        if ($accion != "run" && $accion != "jump") {
            throw new Exception("El array solo puede contener 'run' o 'jump'.");
        }
    }
    // Verificamos que la pista solo contenga "_" o "|"
    foreach (str_split($pista) as $caracter) {
        if ($caracter != "_" && $caracter != "|") {
            throw new Exception("La pista solo puede contener '_' o '|'.");
        }
    }
    // Verificamos que el tamaño del array y la pista sean iguales
    if (count($atleta) != strlen($pista)) {
        throw new Exception("El tamaño del array no coincide con el tamaño de la pista.");
    }

    // Si todo es correcto, retornamos true
    return true;
}


function carreraObstaculos(array $atleta, string $pista): bool
{

    // Verificamos que los valores sean correctos
    if (!checkValues($atleta, $pista)) {
        return false;
    }

    // Convertimos la pista en un array
    $pistaArray = str_split($pista);

    // Inicializamos la variable de resultado
    $resultado = true;

    foreach ($atleta as $i => $accion) {
        if ($accion == "run" && $pistaArray[$i] == "|") {
            $pistaArray[$i] = "/";
            $resultado = false;
        } else if ($accion == "jump" && $pistaArray[$i] == "_") {
            $pistaArray[$i] = "x";
            $resultado = false;
        } else {
            continue;
        }
    }
    // Convertimos el array de vuelta a string
    $pista = implode("", $pistaArray);

    // Imprimimos la pista
    echo $pista . "\n";
    return $resultado;
}


// Ejemplo de uso
$atleta = ["run", "jump", "run", "jump", "run"];
$pista = "_|_||";
$resultado = carreraObstaculos($atleta, $pista);
