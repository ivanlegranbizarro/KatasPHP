<?php
/* 3. Implementa una función que reciba un array y elimine todos los elementos duplicados, manteniendo el orden original (sin usar `array_unique()`). */

function eliminarDuplicados(array $array): array
{
    $nuevoArray = [];
    foreach ($array as $item) {
        if (!in_array($item, $nuevoArray)) {
            $nuevoArray[] = $item;
        }
    }
    return $nuevoArray;
}


print_r(eliminarDuplicados([1, 2, 3, 4, 5, 1, 1, 2, 3, 4, 5]));
