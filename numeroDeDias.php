<?php

function fechaValida(string $fecha, string $formato): bool
{
    // crea un objeto DateTime a partir de la fecha y el formato proporcionados
    $dt = DateTime::createFromFormat($formato, $fecha);
    // verifica si la fecha es válida y si el formato coincide
    return ($dt) && ($dt->format($formato) === $fecha);
}

function diasEntreFechas(string $str1, string $str2): int
{
    // Definir el formato de fecha esperado
    $formato = 'd-m-Y';

    // Verificar si las fechas son válidas
    // Si no son válidas, lanzar una excepción
    if (!fechaValida($str1, $formato) || !fechaValida($str2, $formato)) {
        throw new Exception("Formato de fecha incorrecto. Debe ser 'd-m-Y'.");
    }

    // Crear objetos DateTime a partir de las cadenas de fecha
    $date1 = DateTime::createFromFormat($formato, $str1);
    $date2 = DateTime::createFromFormat($formato, $str2);

    // guardar la diferencia de las fechas 
    $diferencia = $date1->diff($date2);
    // retorna los dias de diferencia
    // abs es el valor absoluto, asi nos aseguramos que el valor siempre sea positivo
    return abs($diferencia->days);
}

// Ejemplo de uso
try {
    $fecha1 = "01-01-2023";
    $fecha2 = "15-01-2023";

    $dias = diasEntreFechas($fecha1, $fecha2);
    echo "La diferencia entre las fechas es de $dias días.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
