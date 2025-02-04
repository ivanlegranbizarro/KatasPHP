<?php
/* ### 9. Encontrar el elemento más común en un array
**Enunciado:** Escribe una función que encuentre el elemento más común en un array. */

function encontrarelementocomunarray(array $array): mixed
{
    foreach ($array as $element) {
        if (!isset($diccionariocomun[$element])) {
            $diccionariocomun[$element] = 1;
        } else {
            $diccionariocomun[$element]++;
        }
    }
    sort($diccionariocomun);
    return array_keys($diccionariocomun)[count($diccionariocomun) - 1];
}

function encontrarelementocomunarraySimple(array $array): mixed
{
    $valor = array_count_values($array);
    sort($valor);
    return array_keys($valor)[count($valor) - 1];
}

echo encontrarElementoComunArray([1, 2, 3, 3, 4, 4, 4, 5]) . PHP_EOL;
echo encontrarelementocomunarraySimple([1, 2, 3, 3, 4, 4, 4, 5]) . PHP_EOL;
