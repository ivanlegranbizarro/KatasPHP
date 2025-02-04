<?php
/* ### 1. Eliminar duplicados de un array
**Enunciado:** Escribe una función que elimine los elementos duplicados de un array, manteniendo el orden original de los elementos. */

function eliminarDuplicadosArray(array $array): array
{
    return array_values(array_unique($array));
}
