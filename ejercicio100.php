<?php
/* ### 8. Rotación de Array
Crea una función que rote los elementos de un array k posiciones a la derecha. Por ejemplo, con k=2, [1,2,3,4,5] se convierte en [4,5,1,2,3]. */

function rotarArray(array $arr, int $k): array
{
    $k = $k % count($arr);
    $primeraMitad = array_slice($arr, -$k);
    $segundaMitad = array_slice($arr, 0, -$k);
    return array_merge($primeraMitad, $segundaMitad);
}

print_r(rotarArray([1, 2, 3, 4, 5], 2));
