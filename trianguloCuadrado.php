<?php

function dibujarCuadrado(int $tamaño): string
{
    if ($tamaño <= 1) {
        throw new InvalidArgumentException("El tamaño debe ser mayor que 1.");
    }

    $resultado = "";

    for ($i = 0; $i < $tamaño; $i++) {
        for ($j = 0; $j < $tamaño; $j++) {
            $resultado .= "*";
        }
        $resultado .= "<br>";
    }
    return $resultado;
}

function dibujarTriangulo(int $tamaño): string
{
    if ($tamaño <= 0) {
        throw new InvalidArgumentException("El tamaño debe ser positivo.");
    }

    $resultado = "";
    for ($i = 1; $i <= $tamaño; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            $resultado .= "*";
        }
        $resultado .= "<br>";
    }
    return $resultado;
}

function dibujarFigura(string $tipo, int $tamaño): string
{
    switch (mb_strtolower($tipo)) {
        case 'cuadrado':
            return dibujarCuadrado($tamaño);
        case 'triangulo':
            return dibujarTriangulo($tamaño);
        default:
            throw new InvalidArgumentException("Figura no reconocida.");
    }
}

// Ejemplo de uso:
echo dibujarFigura("cuadrado", 5);
echo "<br>";
echo dibujarFigura("triangulo", 5);
