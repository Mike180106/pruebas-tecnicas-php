<?php

function enMayusculas(string $str)
{
    // Convertir la cadena en minusculas
    $strMin = mb_strtolower($str);
    $longitud = mb_strlen($strMin);
    $resultado = "";

    for ($i = 0; $i < $longitud; $i++) {

        // Si el caracter es un espacio o es el primer caracter, lo convertimos a mayusculas
        if (mb_substr($strMin, $i - 1, 1) == " " || $i == 0) {
            $resultado .= mb_strtoupper(mb_substr($strMin, $i, 1));
        } else {
            // Si no, lo dejamos como esta
            $resultado .= mb_substr($strMin, $i, 1);
        }
    }

    return $resultado;
}

// Ejemplo de uso
$cadena = "hola mundo, soy un programador";
echo enMayusculas($cadena);
