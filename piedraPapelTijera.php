<?php

function winner(array $arr)
{
    if (!comprobarEntrada($arr)) {
        return "Error: Entrada no válida.";
    }
    $puntosJugador1 = 0;
    $puntosJugador2 = 0;
    $empates = 0;

    foreach ($arr as $jugada) {
        if ($jugada[0] == $jugada[1]) {
            $empates++;
        } else if (($jugada[0] == "R" && $jugada[1] == "S") ||
            ($jugada[0] == "S" && $jugada[1] == "P") ||
            ($jugada[0] == "P" && $jugada[1] == "R")
        ) {
            $puntosJugador1++;
        } else {
            $puntosJugador2++;
        }
    }

    if ($puntosJugador1 > $puntosJugador2) {
        return "Jugador 1 gana con $puntosJugador1 puntos";
    } else if ($puntosJugador2 > $puntosJugador1) {
        return "Jugador 2 gana con $puntosJugador2 puntos";
    } else {
        return "Empate con $empates empates";
    }
}


function comprobarEntrada(array $arr)
{
    $validas = ["R", "P", "S"];
    foreach ($arr as $jugada) {
        if (count($jugada) != 2) {
            return false;
        } elseif (!in_array($jugada[0], $validas) || !in_array($jugada[1], $validas)) {
            return false;
        }
    }
    return true;
}


// ejemplo de uso

$jugadas = [["P", "S"], ["S", "P"], ["R", "P"], ["S", "S"]];

echo winner($jugadas);
