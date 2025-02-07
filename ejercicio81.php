<?php
/* ### Kata 9: Eliminación de Duplicados
Implementa una función que elimine elementos duplicados de un array manteniendo el orden original. */


function eliminarDuplicadosArray(array $array): array
{
    return array_unique($array, SORT_REGULAR);
}


print_r(eliminarDuplicadosArray([1, 2, 3, 4, 5, 1, 1, 2, 3, 4, 5]));
