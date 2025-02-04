<?php

/* ### 2. Contar ocurrencias en un array
**Enunciado:** Escribe una función que reciba un array y devuelva un objeto donde las claves sean los elementos del array y los valores el número de veces que aparecen.
 */


function contarOcurrenciasArray(array $array): array
{
    foreach ($array as $item) {
        if (!isset($diccionario[$item])) {
            $diccionario[$item] = 1;
        } else {
            $diccionario[$item]++;
        }
    }
    return $diccionario;
}



print_r(contarOcurrenciasArray([1, 2, 2, 3, 3, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5]));
