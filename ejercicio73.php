<?php
/* ### 5. Manipulación de Arrays Multidimensionales
**Enunciado:** Desarrolla una función que reciba un array de transacciones bancarias y devuelva estadísticas: total de ingresos, total de gastos, balance neto y transacción más grande. */

function totalIngresos(array $transacciones): float
{
    $resultado = 0;
    foreach ($transacciones as $transaccion) {
        if ($transaccion['tipo'] === 'ingreso') {
            $resultado += $transaccion['monto'];
        }
    }
    return $resultado;
}

function totalGastos(array $transacciones): float
{
    $resultado = 0;
    foreach ($transacciones as $transaccion) {
        if ($transaccion['tipo'] === 'gasto') {
            $resultado += $transaccion['monto'];
        }
    }
    return $resultado;
}
function balance(float $ingresos, float $gastos): float
{
    return $ingresos - $gastos;
}

function mayorTransaccion(array $transacciones): array
{
    $mayor = $transacciones[0];
    foreach ($transacciones as $transaccion) {
        if ($transaccion['monto'] > $mayor['monto']) {
            $mayor = $transaccion;
        }
    }
    return $mayor;
}

function estadisticaIngresos(array $transacciones): array
{
    $ingresos = totalIngresos($transacciones);
    $gastos = totalGastos($transacciones);
    $balance = balance(ingresos: $ingresos, gastos: $gastos);
    $mayorTransaccion = mayorTransaccion($transacciones);
    return [
        'Total de ingresos' => $ingresos,
        'Total de gastos' => $gastos,
        'Mayor transacción' => $mayorTransaccion,
        'Balance' => $balance
    ];
}



$transacciones = [
    ['tipo' => 'ingreso', 'monto' => 1000],
    ['tipo' => 'gasto', 'monto' => 500],
    ['tipo' => 'ingreso', 'monto' => 2000],
];


print_r(estadisticaIngresos($transacciones));
