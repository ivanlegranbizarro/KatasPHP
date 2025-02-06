<?php
/* ### Kata 5: Aplanado de Array

Desarrolla una función que reciba un array multidimensional y lo convierta en un array unidimensional.
$array = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
*/


function convertirEnArrayUnidimensional(array $arrayMultidimensional): array
{
    $arrayUnidimensional = [];
    array_walk_recursive($arrayMultidimensional, function ($item) use (&$arrayUnidimensional) {
        $arrayUnidimensional[] = $item;
    });
    return $arrayUnidimensional;
}

print_r(convertirEnArrayUnidimensional([[1, 2, 3], [4, 5, 6], [7, 8, 9]]));
