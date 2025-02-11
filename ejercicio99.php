<?php
/* ### 7. Número Más Frecuente
Escribe una función que encuentre el número que más se repite en un array. Si hay varios con la misma frecuencia, devolver el primero de ellos. */


function encontrarNumeroMayorFrecuencia(array $array): int
{
    $diccionarioValores = array_count_values($array);
    arsort($diccionarioValores);
    return array_key_first($diccionarioValores);
}


$arrayDePrueba = [1, 2, 2, 2, 2, 2, 3, 4, 5];


echo encontrarNumeroMayorFrecuencia($arrayDePrueba) . PHP_EOL;
