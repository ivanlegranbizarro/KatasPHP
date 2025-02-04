<?php
/* 7. **Eliminar duplicados de un array**:
   Escribe una función que elimine los elementos duplicados de un array.
*/

function eliminarDuplicadosArray(array $array): array
{
    return array_unique($array);
}


function eliminarDuplicadosSinUsarArrayUnique(array $array): array
{
    $nuevoArray = [];

    for ($i = 0; $i < count($array); $i++) {
        if (!in_array($array[$i], $nuevoArray)) {
            $nuevoArray[] = $array[$i];
        }
    }
    return $nuevoArray;
}



print_r(eliminarDuplicadosArray([1, 2, 3, 4, 5, 1, 1, 2, 3, 4, 5]));

echo PHP_EOL;

print_r(eliminarDuplicadosSinUsarArrayUnique([1, 2, 3, 4, 5, 1, 1, 2, 3, 4, 5]));
