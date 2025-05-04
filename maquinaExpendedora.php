<?php

/*
 * Simula el funcionamiento de una máquina expendedora creando una operación
 * que reciba dinero (array de monedas) y un número que indique la selección
 * del producto.
 * - El programa retornará el nombre del producto y un array con el dinero
 *   de vuelta (con el menor número de monedas).
 * - Si el dinero es insuficiente o el número de producto no existe,
 *   deberá indicarse con un mensaje y retornar todas las monedas.
 * - Si no hay dinero de vuelta, el array se retornará vacío.
 * - Para que resulte más simple, trabajaremos en céntimos con monedas
 *   de 5, 10, 50, 100 y 200.
 * - Debemos controlar que las monedas enviadas estén dentro de las soportadas.
 */


// Definición de constantes
// Monedas soportadas en céntimos 
const SUPPORTED_COINS = [200, 100, 50, 10, 5];

// Productos disponibles: selección => ['name' => nombre, 'price' => precio en céntimos] 
const PRODUCTS = [
    1 => ['name' => 'Agua',      'price' => 150],
    2 => ['name' => 'Refresco',  'price' => 175],
    3 => ['name' => 'Chips',     'price' => 200],
    4 => ['name' => 'Chocolate', 'price' => 250],
];

// Valida que todas las monedas enviadas estén soportadas.

function validateCoins(array $coins)
{
    foreach ($coins as $coin) {
        if (!in_array($coin, SUPPORTED_COINS, true)) {
            return "Moneda no soportada: $coin céntimos";
        }
    }
    return true;
}

// Valida que la selección de producto exista.

function validateSelection(int $selection)
{
    if (!isset(PRODUCTS[$selection])) {
        return "Selección inválida: $selection";
    }
    return true;
}

// Calcula el cambio con el menor número de monedas posibles.
function calculateChange(int $amount): array
{
    $change = [];
    foreach (SUPPORTED_COINS as $coin) {
        while ($amount >= $coin) {
            $change[] = $coin;
            $amount -= $coin;
        }
    }
    return $change;
}


// Simula la compra de un producto en la máquina expendedora.

function purchase(array $coins, int $selection): array
{
    // 1) Validar monedas
    $valid = validateCoins($coins);
    if ($valid !== true) {
        return ['product' => null, 'change' => $coins, 'error' => $valid];
    }
    // 2) Validar selección de producto
    $validSel = validateSelection($selection);
    if ($validSel !== true) {
        return ['product' => null, 'change' => $coins, 'error' => $validSel];
    }
    // 3) Calcular total ingresado y precio
    $product = PRODUCTS[$selection];
    $total   = array_sum($coins);
    if ($total < $product['price']) {
        return [
            'product' => null,
            'change'  => $coins,
            'error'   => "Dinero insuficiente. Necesita {$product['price']} céntimos, ha ingresado {$total} céntimos."
        ];
    }
    // 4) Calcular y devolver cambio
    $changeAmount = $total - $product['price'];
    $changeCoins  = calculateChange($changeAmount);

    return ['product' => $product['name'], 'change' => $changeCoins, 'error' => null];
}

// --- Ejemplos de uso ---

// 1. Compra válida:
$result1 = purchase([100, 100], 1);
printResult($result1);

// 2. Moneda inválida:
$result2 = purchase([1, 5, 10], 2);
printResult($result2);

// 3. Selección inválida:
$result3 = purchase([100, 100], 99);
printResult($result3);

// 4. Fondos insuficientes:
$result4 = purchase([50, 50], 3);
printResult($result4);


function printResult(array $result): void
{
    if ($result['error']) {
        echo "Error: {$result['error']}\n";
        echo "Devolviendo: " . implode(', ', $result['change']) . "\n\n";
    } else {
        echo "Producto: {$result['product']}\n";
        echo "Cambio: " . (empty($result['change']) ? 'Sin cambio' : implode(', ', $result['change'])) . "\n\n";
    }
}
