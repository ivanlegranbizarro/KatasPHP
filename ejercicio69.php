<?php
/* ### 10. Aplanar array
**Enunciado:** Escribe una función que aplane un array de múltiples niveles en uno de un solo nivel. Por ejemplo: [1,[2,[3,4]],5] → [1,2,3,4,5]. */

function aplanarArray(array $array): array
{
    $nuevoArray = array();
    array_walk_recursive($array, function ($item) use (&$nuevoArray) {
        $nuevoArray[] = $item;
    });
    return $nuevoArray;
}


print_r(aplanarArray([1, [2, [3, 4]], 5]));
