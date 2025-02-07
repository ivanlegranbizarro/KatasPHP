<?php
/* ### Kata 7: Cálculo de Estadísticas
Crea una función que reciba un array de números y devuelva un array asociativo con media, mínimo y máximo. */

function mediaAritmeticaDeUnArray(array $array): int|float
{
    return count($array) > 0 ? array_sum($array) / count($array) : 0;
}

function minimoDeUnArray(array $array): int
{
    return min($array);
}

function maximoDeUnArray(array $array): int
{
    return max($array);
}

function arrayEstadistico(array $numeros): array
{
    return [
        'Media aritmética' => mediaAritmeticaDeUnArray($numeros),
        'Mínimo' => minimoDeUnArray($numeros),
        'Máximo' => maximoDeUnArray($numeros)
    ];
}


print_r(arrayEstadistico([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]));
