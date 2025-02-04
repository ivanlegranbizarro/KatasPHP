<?php
/* ### 5. Encontrar el número faltante en un array
**Enunciado:** Escribe una función que encuentre el número faltante en un array de números consecutivos.
*/


function encontrarNumeroFaltante(array $array): int|string
{
    for ($i = 1; $i < count($array); $i++) {
        if ($array[$i] != $array[$i - 1] + 1) {
            return $array[$i - 1] + 1;
        }
    }
    return 'No hay ningún numero faltante en la secuencia';
}


echo encontrarNumeroFaltante([1, 2, 3, 4, 6]) . PHP_EOL;

echo encontrarNumeroFaltante([1, 2, 3, 4, 5]) . PHP_EOL;
