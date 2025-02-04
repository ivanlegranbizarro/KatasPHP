<?php
/* 3. **Contar la frecuencia de elementos en un array**:
   Escribe una función que cuente la frecuencia de cada elemento en un array y devuelva un array asociativo con los resultados.
 */


function contarFrecuenciaElementos(array $array): array
{
    foreach ($array as $elemento) {
        if (!isset($diccionario[$elemento])) {
            $diccionario[$elemento] = 1;
        } else {
            $diccionario[$elemento]++;
        }
    }
    return $diccionario;
}


$array = [1, 2, 3, 4, 5, 1, 1, 2, 3, 4, 5];

print_r(contarFrecuenciaElementos($array));
