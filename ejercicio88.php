<?php
/* ### Nivel Básico
1. Crea una función que reciba un array y devuelva el mismo array pero con sus elementos en orden inverso, sin usar la función `array_reverse()`. */


function revertirOrdenUnArray(array $array): array
{
    $arrayInvertido = [];
    for ($i = count($array) - 1; $i >= 0; $i--) {
        $arrayInvertido[] = $array[$i];
    }
    return $arrayInvertido;
}


print_r(revertirOrdenUnArray([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]));
