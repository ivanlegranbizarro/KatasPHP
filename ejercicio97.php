<?php
/* ### 5. Suma de Arrays
Crea una función que reciba dos arrays de números de la misma longitud y devuelva un nuevo array con la suma de los elementos en la misma posición. */


function sumarPosicionDosArrays(array $array1, array $array2): array
{
    $nuevoArray = [];
    for ($i = 0; $i < count($array1); $i++) {
        $nuevoArray[] = $array1[$i] + $array2[$i];
    }
    return $nuevoArray;
}


print_r(sumarPosicionDosArrays([1, 2, 3], [4, 5, 6]));
