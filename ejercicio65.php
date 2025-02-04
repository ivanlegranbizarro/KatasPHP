<?php

/* ### 3. Rotar un array
**Enunciado:** Escribe una función que rote los elementos de un array k posiciones a la derecha. Por ejemplo, con k=2, [1,2,3,4,5] se convierte en [4,5,1,2,3]. */

function rotarArray(array $array, int $numero): array
{
    $parte1 = array_slice($array, -$numero);
    $parte2 = array_slice($array, 0, -$numero);
    return array_merge($parte1, $parte2);
}


print_r(rotarArray([1, 2, 3, 4, 5], 2));
