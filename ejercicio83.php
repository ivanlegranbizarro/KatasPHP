<?php
/* ### Kata 12: Anidamiento de Arrays
Desarrolla una función que reciba un array unidimensional y lo convierta en un array multidimensional agrupando elementos cada 3 posiciones. */

function subArraysCadaTresPosiciones(array $array): array
{
    return array_chunk($array, 3);
}


print_r(subArraysCadaTresPosiciones([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]));
