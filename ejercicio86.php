<?php
/* ### Kata 15: Análisis de Frecuencia
Desarrolla una función que reciba un array de elementos y devuelva un array asociativo con la frecuencia de cada elemento, ordenado de mayor a menor. */


function frecuenciaDeCadaElementoDelArray(array $array): array
{
    $diccionario = [];
    foreach ($array as $item) {
        if (!isset($diccionario[$item])) {
            $diccionario[$item] = 1;
        } else {
            $diccionario[$item]++;
        }
    }
    arsort($diccionario);
    return $diccionario;
}

function frecuenciaDeCadaElementoBuiltInFunctions(array $array): array
{
    $diccionario = array_count_values($array);
    arsort($diccionario);
    return $diccionario;
}


// print_r(frecuenciaDeCadaElementoDelArray([1, 1, 1, 1, 2, 2, 2, 3, 3, 3, 3, 3, 3, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]));

print_r(frecuenciaDeCadaElementoBuiltInFunctions([1, 1, 1, 1, 2, 2, 2, 3, 3, 3, 3, 3, 3, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]));
