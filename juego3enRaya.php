<?php


function validarGame(array $tablero)
{
    // verificamos tamaño del tablero 
    if (!tableroValido($tablero)) {
        return "El tablero no es válido.";
    }

    // verificamos si hay un ganador
    $lines = [];

    // filas 
    for ($i = 0; $i < 3; $i++) {
        $lines[] = [$tablero[$i][0], $tablero[$i][1], $tablero[$i][2]];
    }

    // columnas 
    for ($i = 0; $i < 3; $i++) {
        $lines[] = [$tablero[0][$i], $tablero[1][$i], $tablero[2][$i]];
    }

    // diagonal de izquierda a derecha
    $lines[] = [$tablero[0][0], $tablero[1][1], $tablero[2][2]];

    // diagonal de derecha a izquierda
    $lines[] = [$tablero[0][2], $tablero[1][1], $tablero[2][0]];

    // iniciamos verificador de ganador

    $ganadorX = false;
    $ganadorO = false;


    foreach ($lines as $line) {
        if ($line == ["X", "X", "X"]) {
            $ganadorX = true;
        } elseif ($line == ["O", "O", "O"]) {
            $ganadorO = true;
        }
    }

    // verificamos si hay un ganador
    if ($ganadorX) {
        return "El ganador es X.";
    } elseif ($ganadorO) {
        return "El ganador es O.";
    } else if ($ganadorX && $ganadorO) {
        return "El juego es un empate.";
    }
}



function tablerovalido(array $tablero)
{
    // verificar tamaño del tablero
    if (count($tablero) != 3) {
        throw new Exception("El tablero debe tener 3 filas.");
    }

    foreach ($tablero as $fila) {
        if (count($fila) != 3) {
            throw new Exception("Cada fila debe tener 3 columnas.");
        }
    }

    foreach ($tablero as $fila) {
        foreach ($fila as $celda) {
            if ($celda != "X" && $celda != "O" && $celda != "") {
                throw new Exception("El tablero solo puede contener 'X', 'O' o espacios vacíos.");
            }
        }
    }
    return true;
}






$tablero1 = [
    ["X", "O", "X"],
    ["O", "X", "O"],
    ["O", "X", "X"]
];

echo validarGame($tablero1) . "<br>";
$tablero2 = [
    ["O", "O", "X"],
    ["X", "O", "X"],
    ["O", "O", "O"]
];
echo validarGame($tablero2) . "<br>";

$tablero3 = [
    ["X", "O", "b"],
    ["O", "X", "O"],
    ["O", "X", "O"]
];
echo validarGame($tablero3) . "<br>";
