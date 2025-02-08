<?php
/* ### Kata 14: Intersección de Conjuntos
Crea una función que reciba dos arrays y devuelva un nuevo array con los elementos comunes, sin duplicados y manteniendo el orden de aparición. */

function interseccion(array $array1, array $array2): array
{
    return array_values(array_intersect($array1, $array2));
}


$array1DePrueba = [1, 2, 3, 4, 5];
$array2DePrueba = [3, 4, 5, 6, 7];
var_dump(interseccion(array1: $array1DePrueba, array2: $array2DePrueba));
